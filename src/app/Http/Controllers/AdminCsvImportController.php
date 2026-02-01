<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Keuzedeel;

class AdminCsvImportController extends Controller
{
    public function showForm()
    {
        // Haal alle geüploade CSV-bestanden op
        $uploadDir = storage_path('app/csv');
        $files = [];
        if (is_dir($uploadDir)) {
            foreach (scandir($uploadDir) as $file) {
                if ($file !== '.' && $file !== '..') {
                    $files[] = $file;
                }
            }
        }
        return view('admin.upload-csv', ['uploadedFiles' => $files]);
    }

    // Verwijder alle oude/kapotte handleUpload code en voeg alleen de juiste versie toe
    public function handleUpload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $filename = $request->file('csv_file')->getClientOriginalName();
        $csvDir = storage_path('app/csv');
        if (!is_dir($csvDir)) {
            mkdir($csvDir, 0777, true);
        }
        $savePath = $csvDir . DIRECTORY_SEPARATOR . $filename;
        $request->file('csv_file')->move($csvDir, $filename);
        Log::info('CSV bestand opgeslagen', [
            'filename' => $filename,
            'savePath' => $savePath,
            'exists' => file_exists($savePath),
            'is_writable' => is_writable($csvDir),
        ]);

        Log::info('CSV upload gestart', [
            'filename' => $filename
        ]);

        // CSV delimiter detectie - gebruik het opgeslagen bestand
        $handle = fopen($savePath, 'r');
        if (!$handle) {
            return back()->withErrors('CSV kon niet worden geopend');
        }

        // Probeer eerste rij met verschillende delimiters
        $firstLineRaw = fgets($handle);
        rewind($handle);
        $firstRowSemicolon = fgetcsv($handle, 0, ';');
        rewind($handle);
        $firstRowComma = fgetcsv($handle, 0, ',');
        rewind($handle);

        Log::info('Delimiter detectie', [
            'raw' => $firstLineRaw,
            'semicolon' => $firstRowSemicolon,
            'semicolon_count' => is_array($firstRowSemicolon) ? count($firstRowSemicolon) : 0,
            'comma' => $firstRowComma,
            'comma_count' => is_array($firstRowComma) ? count($firstRowComma) : 0,
        ]);

        // Kies delimiter met meeste kolommen
        $delimiter = (count($firstRowSemicolon) > count($firstRowComma)) ? ';' : ',';
        Log::info('Gekozen delimiter', ['delimiter' => $delimiter]);

        // Lees alle rijen met gekozen delimiter
        $rows = [];
        rewind($handle);
        while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
            $rows[] = $row;
        }
        fclose($handle);

        if (count($rows) < 8) {
            return back()->withErrors('CSV bevat te weinig rijen');
        }

      
        // Rij 5 → keuzedeelcodes
        $row5 = $rows[4];
        $keuzedeelStruct = [];
        $startCol = 6; // kolom G

        for ($i = $startCol; $i < count($row5); $i += 4) {
            $code = trim($row5[$i] ?? '');
            if ($code !== '') {
                $keuzedeelStruct[$code] = [$i, $i+1, $i+2, $i+3];
            }
        }

        Log::info('Keuzedeelstructuur', $keuzedeelStruct);

        // Rij 7 → labels
        $labelRow = $rows[6];
            Log::info('Labelrij array na fgetcsv', [
                'raw' => $labelRow,
                'count' => is_array($labelRow) ? count($labelRow) : 0,
                'joined' => is_array($labelRow) ? implode('|', $labelRow) : $labelRow
            ]);

        // Robuuste kolomherkenning: hoofdletterongevoelig en spatie-trim
        $findCol = function($needle, $haystack) {
            foreach ($haystack as $idx => $col) {
                Log::info('Vergelijk kolom', ['needle' => $needle, 'col' => $col, 'vergelijk' => strtolower(trim($col)) === strtolower(trim($needle))]);
                if (strtolower(trim($col)) === strtolower(trim($needle))) {
                    return $idx;
                }
            }
            return false;
        };
        $cols = [
            'roostergroep'  => $findCol('Roostergroep', $labelRow),
            'student'      => $findCol('student', $labelRow),
            'naam'         => $findCol('naam', $labelRow),
        ];
        Log::info('Kolomindexen gevonden', $cols);

        Log::info('Kolommen gevonden', $cols);

        if (in_array(false, $cols, true)) {
            return back()->withErrors('Niet alle vereiste kolommen gevonden in CSV');
        }

        $userCount = 0;
        for ($r = 7; $r < count($rows); $r++) {
            $row = $rows[$r];
            if (empty(array_filter($row))) continue;

            $studentnummer = trim($row[$cols['student']] ?? '');
            $naam          = trim($row[$cols['naam']] ?? '');
            $klas          = trim($row[$cols['roostergroep']] ?? '');

            if (!$studentnummer || !$naam) continue;

            $email = $studentnummer . '@student.tcr.nl';

            $user = User::updateOrCreate(
                ['studentnummer' => $studentnummer],
                [
                    'name' => $naam,
                    'email' => $email,
                    'klas' => $klas,
                    'role' => 'student',
                    'password' => bcrypt('changeme'),
                ]
            );
            $userCount++;

            $behaaldCount = 0;

            foreach ($keuzedeelStruct as $code => $indices) {
                $behaald = false;

                foreach ($indices as $i) {
                    if (!empty(trim($row[$i] ?? ''))) {
                        $behaald = true;
                        break;
                    }
                }

                if ($behaald) {
                    $keuzedeel = Keuzedeel::where('keuzedeelcode', $code)->first();
                    if ($keuzedeel) {
                        DB::table('behaalde_keuzedelen')->updateOrInsert(
                            [
                                'user_id' => $user->id,
                                'keuzedeel_id' => $keuzedeel->id,
                                'updated_at' => now(),
                            ]
                        );
                        $behaaldCount++;
                    }
                }
            }

            Log::info('Student verwerkt', [
                'studentnummer' => $studentnummer,
                'behaalde_keuzedelen' => $behaaldCount
            ]);
        }

        $melding = "CSV-bestand '$filename' is succesvol geüpload. $userCount gebruikers zijn verwerkt.";
        return redirect()->route('admin.upload.csv')->with('success', $melding);
    }

    public function deleteCsv($filename)
    {
        $csvPath = storage_path('app/csv/' . $filename);
        
        if (!file_exists($csvPath)) {
            return redirect()->route('admin.upload.csv')->withErrors('Bestand niet gevonden.');
        }

        // Parse CSV en verwijder alle users uit dit bestand
        $handle = fopen($csvPath, 'r');
        $rows = [];
        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            $rows[] = $row;
        }
        fclose($handle);

        if (count($rows) < 8) {
            unlink($csvPath);
            return redirect()->route('admin.upload.csv')->with('success', "Bestand '$filename' verwijderd.");
        }

        // Rij 7 → labels
        $labelRow = $rows[6];
        $findCol = function($needle, $haystack) {
            foreach ($haystack as $idx => $col) {
                if (strtolower(trim($col)) === strtolower(trim($needle))) {
                    return $idx;
                }
            }
            return false;
        };
        
        $studentCol = $findCol('student', $labelRow);
        
        if ($studentCol === false) {
            unlink($csvPath);
            return redirect()->route('admin.upload.csv')->with('success', "Bestand '$filename' verwijderd.");
        }

        $deletedCount = 0;
        for ($r = 7; $r < count($rows); $r++) {
            $row = $rows[$r];
            if (empty(array_filter($row))) continue;

            $studentnummer = trim($row[$studentCol] ?? '');
            if (!$studentnummer) continue;

            $user = User::where('studentnummer', $studentnummer)->first();
            if ($user) {
                $user->delete();
                $deletedCount++;
            }
        }

        unlink($csvPath);
        return redirect()->route('admin.upload.csv')->with('success', "Bestand '$filename' en $deletedCount gebruikers verwijderd.");
    }
}