<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StagemarktProfiel;


class ImportController extends Controller
{
    public function showForm()
    {
        $importedData = StagemarktProfiel::all();
    
        return view('import.form', compact('importedData'));
    }

    public function import(Request $request)
    {
    $request->validate([
        'json_file' => 'required|mimes:json',
    ]);

    $json = file_get_contents($request->file('json_file')->getRealPath());
    $data = json_decode($json, true);

    foreach ($data as $item) {
        // Set cg_id to 1 and create the record
        StagemarktProfiel::create(array_merge($item, ['cg_id' => 1]));
    }

    return redirect()->route('import.form')->with('success', 'Data imported successfully.');
    }
}