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
            'json_file' => 'required|mimes:json|max:10240', // Validate that the file is a JSON file with a maximum size of 10MB
        ]);
    
        $json = file_get_contents($request->file('json_file')->getRealPath());
        $data = json_decode($json, true);
    
        if (isset($data['bedrijf_dict'])) {
            $companies = $data['bedrijf_dict'];
    
            foreach ($companies as $companyId => $companyData) {
                $profiel = $companyData['profiel'] ?? null;
    
                if ($profiel) {
                    // Extract only the desired fields
                    $filteredData = [
                        'name' => $profiel['naam'] ?? 'Unknown', // Provide a default value if 'naam' is null or missing
                        'kvk_naam' => $profiel['kvk_naam'] ?? 'Unknown',
                        'kvk_nummer' => $profiel['kvk_nummer'] ?? 'Unknown',
                        'kvk_vestigingsnummer' => $profiel['kvk_vestigingsnummer'] ?? 'Unknown',
                        'bedrijfsindeling' => $profiel['bedrijfsindeling'] ?? 'Unknown',
                        'bedrijfsgrootte' => $profiel['bedrijfsgrootte'] ?? 'Unknown',
                        'capaciteit' => $profiel['capaciteit'] ?? 'Unknown',
                    ];
    
                    // Set cg_id to 1 and create the record
                    StagemarktProfiel::create(array_merge($filteredData, ['cg_id' => 1]));
                }
            }
        }
    
        return redirect()->route('import.form')->with('success', 'Data imported successfully.');
    }
}