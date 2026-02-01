<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuzedeel;

class KeuzedeelController extends Controller
{
    // Toon detailpagina van een keuzedeel
    public function show($id)
    {
        $keuzedeel = Keuzedeel::findOrFail($id);
        return view('keuzedelen.show', compact('keuzedeel'));
    }
}
