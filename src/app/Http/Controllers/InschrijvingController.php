<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keuzedeel;

class InschrijvingController extends Controller
{
    // Toon het inschrijfformulier
    public function create()
    {
        $user = Auth::user();
        // Haal alleen keuzedelen van de opleiding van de student op
        $keuzedelen = Keuzedeel::where('opleiding_id', $user->opleiding_id)->get();
        $inschrijving = \App\Models\Inschrijving::where('user_id', $user->id)->first();
        return view('inschrijven.create', compact('keuzedelen', 'inschrijving'));
    }

    // Verwerk het inschrijfformulier
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'keuze1' => 'required|different:keuze2,keuze3',
            'keuze2' => 'required|different:keuze1,keuze3',
            'keuze3' => 'required|different:keuze1,keuze2',
        ], [
            'different' => 'Elke keuze moet een ander keuzedeel zijn.'
        ]);

        $keuzeIds = [
            $request->input('keuze1'),
            $request->input('keuze2'),
            $request->input('keuze3'),
        ];

        // Controleer of student al een inschrijving heeft
        $alIngeschreven = \App\Models\Inschrijving::where('user_id', $user->id)->exists();
        if ($alIngeschreven) {
            return back()->with('error', 'Je hebt je al ingeschreven. Je kunt maar één keer je voorkeuren opgeven.');
        }

        // Sla de drie voorkeuren op in één record
        \App\Models\Inschrijving::create([
            'user_id' => $user->id,
            'keuzedeel_1_id' => $request->input('keuze1'),
            'keuzedeel_2_id' => $request->input('keuze2'),
            'keuzedeel_3_id' => $request->input('keuze3'),
            'status' => 'open',
        ]);
        return redirect('/')->with('success', 'Je inschrijving met drie voorkeuren is opgeslagen!');
    }
}
