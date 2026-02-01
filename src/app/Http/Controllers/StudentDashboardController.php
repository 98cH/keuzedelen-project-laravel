<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Keuzedeel;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user();
        // Haal alleen keuzedelen op die bij de opleiding van de student horen
        $keuzedelen = Keuzedeel::where('opleiding_id', $student->opleiding_id)->get();
        $behaaldeKeuzedeelIds = $student->behaaldeKeuzedelen()->pluck('keuzedeel_id')->toArray();

        return view('student.dashboard', [
            'student' => $student,
            'keuzedelen' => $keuzedelen,
            'behaaldeKeuzedeelIds' => $behaaldeKeuzedeelIds,
        ]);
    }
}
