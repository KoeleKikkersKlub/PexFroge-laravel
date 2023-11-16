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

    public function createTrajectForm()
    {
        return view('traject.create');
    }

    public function storeTraject(Request $request)
    {
        $validatedData = $request->validate([
            'progress' => 'required|integer',
            'bedrijf_id'=> 'required|integer',
            'docent_id'=> 'required|integer'
        ]);

        $traject = new Traject([
            'progress' => $validatedData['progress'],
        ]);

        $traject->student_id = Auth::id();

        $traject->docent_id = $validatedData['docent_id'];
        $traject->bedrijf_id = $validatedData['bedrijf_id'];

        $traject->save();

        return redirect()->route('homepage')->with('success', 'Traject created successfully!');
    }
}
