<?php

namespace App\Http\Controllers;

use App\Models\Keuzedeel;
use App\Models\Opleiding;
use App\Models\Periode;
use Illuminate\Http\Request;

class AdminKeuzedeelController extends Controller
{
    public function index()
    {
        $keuzedelen = Keuzedeel::with(['opleiding', 'periode'])->orderBy('titel')->get();
        return view('admin.keuzedelen.index', compact('keuzedelen'));
    }

    public function create()
    {
        $opleidingen = Opleiding::orderBy('naam')->get();
        $periodes = Periode::orderBy('startdatum')->get();

        return view('admin.keuzedelen.create', compact('opleidingen', 'periodes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titel' => ['required', 'string', 'max:255'],
            'keuzedeelcode' => ['required', 'string', 'max:50', 'unique:keuzedelen,keuzedeelcode'],
            'beschrijving' => ['required', 'string'],
            'max_inschrijvingen' => ['required', 'integer', 'min:23', 'max:30'],
            'actief' => ['nullable', 'boolean'],
            'periode_id' => ['required', 'exists:periodes,id'],
            'opleiding_id' => ['nullable', 'exists:opleidingen,id'],
        ]);

        $data['actief'] = $request->boolean('actief');

        Keuzedeel::create($data);

        return redirect()->route('admin.keuzedelen.index')
            ->with('success', 'Keuzedeel is toegevoegd.');
    }

    public function edit(Keuzedeel $keuzedeel)
    {
        $opleidingen = Opleiding::orderBy('naam')->get();
        $periodes = Periode::orderBy('startdatum')->get();

        return view('admin.keuzedelen.edit', compact('keuzedeel', 'opleidingen', 'periodes'));
    }

    public function update(Request $request, Keuzedeel $keuzedeel)
    {
        $data = $request->validate([
            'titel' => ['required', 'string', 'max:255'],
            'keuzedeelcode' => ['required', 'string', 'max:50', 'unique:keuzedelen,keuzedeelcode,' . $keuzedeel->id],
            'beschrijving' => ['required', 'string'],
            'max_inschrijvingen' => ['required', 'integer', 'min:23', 'max:30'],
            'actief' => ['nullable', 'boolean'],
            'periode_id' => ['required', 'exists:periodes,id'],
            'opleiding_id' => ['nullable', 'exists:opleidingen,id'],
        ]);

        $data['actief'] = $request->boolean('actief');

        $keuzedeel->update($data);

        return redirect()->route('admin.keuzedelen.index')
            ->with('success', 'Keuzedeel is bijgewerkt.');
    }

    public function destroy(Keuzedeel $keuzedeel)
    {
        $keuzedeel->delete();

        return redirect()->route('admin.keuzedelen.index')
            ->with('success', 'Keuzedeel is verwijderd.');
    }

    public function toggle(Keuzedeel $keuzedeel)
    {
        $keuzedeel->actief = !$keuzedeel->actief;
        $keuzedeel->save();

        return redirect()->route('admin.keuzedelen.index')
            ->with('success', 'Keuzedeel status is aangepast.');
    }
}
