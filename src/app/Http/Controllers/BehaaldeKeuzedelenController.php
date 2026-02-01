<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BehaaldeKeuzedeel;

class BehaaldeKeuzedelenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $behaaldeKeuzedelen = BehaaldeKeuzedeel::with('keuzedeel')
            ->where('user_id', $user->id)
            ->orderByDesc('behaald_op')
            ->get();
        return view('behaalde-keuzedelen.index', compact('behaaldeKeuzedelen'));
    }
}
