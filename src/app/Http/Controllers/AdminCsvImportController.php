<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCsvImportController extends Controller
{
    // Toon het uploadformulier voor CSV-bestanden
    public function showForm()
    {
        return view('admin.upload-csv');
    }

    public function handleUpload(Request $request)
    {
        // Valideer of er een CSV-bestand is geüpload
        $request->validate([ 
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        // Sla het geüploade bestand tijdelijk op
        $path = $request->file('csv_file')->store('csv');
        $fullPath = storage_path('app/' . $path);

        // Open het CSV-bestand voor lezen
        $file = fopen($fullPath, 'r');

        // Controleer of het bestand succesvol is geopend
        if (!$file) {
            return back()->withErrors('CSV-bestand kon niet worden geopend.');
        }

        // Initialiseer variabelen voor headers en rijen
        $headers = null;
        $rows = [];
        $rowIndex = 0;

        // Lees het CSV-bestand regel voor regel
        while (($row = fgetcsv($file, 0, ';')) !== false) {
            if ($rowIndex === 0) {
                // Sla de eerste rij op als kolomkoppen
                $headers = $row;
            } else {
                // Sla elke volgende rij op als studentgegevens
                $rows[] = $row;
            }
            $rowIndex++;
        }

        // Sluit het bestand
        fclose($file);

        // Toon de headers en rijen voor controle
        // Haal alle keuzedeelcodes op uit de database (code => id)
        $keuzedelen = \App\Models\Keuzedeel::pluck('id', 'keuzedeelcode')->toArray();

        // Detecteer welke headers keuzedeelcodes zijn en sla hun kolomindex op
        $keuzedeelKolommen = []; // [kolomIndex => keuzedeel_id]
        foreach ($headers as $index => $header) {
            if (isset($keuzedelen[$header])) {
                $keuzedeelKolommen[$index] = $keuzedelen[$header];
            }
        }

        foreach ($rows as $row) {
            $naam = $row[0] ?? null;
            $email = $row[1] ?? null;
            $klas = $row[2] ?? null;

            if (!$email) continue; // Sla lege rijen over

            // Student aanmaken of updaten, sla klas op in users-tabel
            $student = \App\Models\User::updateOrCreate(
                ['email' => $email],
                ['name' => $naam, 'klas' => $klas, 'role' => 'student']
            );

            // Loop door alle keuzedeel-kolommen
            foreach ($keuzedeelKolommen as $colIndex => $keuzedeelId) {
                $behaald = false;
                for ($i = 0; $i < 4; $i++) {
                    if (!empty($row[$colIndex + $i] ?? null)) {
                        $behaald = true;
                        break;
                    }
                }
                if ($behaald) {
                    // Record aanmaken in behaalde_keuzedelen (zonder klas)
                    \DB::table('behaalde_keuzedelen')->updateOrInsert([
                        'user_id' => $student->id,
                        'keuzedeel_id' => $keuzedeelId,
                    ], [
                        'behaald_op' => now(),
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]);
                }
            }
        }

        return back()->with('success', 'CSV verwerkt!');
    }
}
