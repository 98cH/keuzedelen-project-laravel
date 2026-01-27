<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Keuzedeel;

class HomeController extends Controller
{
    // Toon de homepagina met keuzedelen, afhankelijk van de rol van de gebruiker
    public function index()
    {
        // Controleer of de gebruiker is ingelogd en student is
        if (Auth::check() && Auth::user()->role === 'student') {
            // Haal het opleiding_id van de student op
            $opleidingId = Auth::user()->opleiding_id;
            // Haal alleen keuzedelen op die bij de opleiding horen (voor demo: filter op periode)
            $keuzedelen = Keuzedeel::where('periode_id', $opleidingId)->get();
        } else {
            // Haal alle keuzedelen op voor gasten en andere rollen
            $keuzedelen = Keuzedeel::all();
        }
        // Geef de keuzedelen door aan de home view
        return view('home', compact('keuzedelen'));
    }
}
