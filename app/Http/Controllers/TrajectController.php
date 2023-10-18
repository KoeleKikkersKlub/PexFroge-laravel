<?php

namespace App\Http\Controllers;

use App\Models\Traject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrajectController extends Controller
{    public function TrajectData() 
    {
        $user = Auth::user();
        // $trajects = Traject::all();
        $trajects = Traject::with('student', 'docent')->get();
                return view('layout.homepage', compact('trajects'));
    }
}
