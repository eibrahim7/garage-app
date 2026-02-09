<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicule;


class VehiculeController extends Controller
{
    /**
     * recherche par marque ou immatriculation
     */
    public function index(Request $request)
    {
        $query=\App\Models\Vehicule::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('marque', 'like', "%$search%")
                  ->orWhere('immatriculation', 'like', "%$search%");
        }
        $vehicules = $query->get();
        return view('vehicules.index', compact('vehicules'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'immatriculation' => 'required|unique:vehicules|max:20',
            'marque' => 'required|string|max:50',
            'modele' => 'nullable|string|max:50',
            'couleur' => 'nullable|string|max:30',
            'annee' => 'nullable|integer|min:1886|max:' . (date('Y') + 1),
            'kilometrage' => 'nullable|integer|min:0',
            'carrosserie' => 'nullable|string|max:30',
            'energie' => 'nullable|string|max:30',
            'boite' => 'nullable|string|max:30  ',
            
        ]);

        \App\Models\Vehicule::create($validated);

        return redirect()->route('vehicules.index')->with('success', 'Véhicule ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        return view('vehicules.show', compact('vehicule'));
    }

    /**
     * affi
     */
    public function edit(string $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        return view('vehicules.edit', compact('vehicule')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $validated = $request->validate([
            'immatriculation' => 'required|max:20|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque' => 'required|string|max:50',
            'modele' => 'nullable|string|max:50',
            'couleur' => 'nullable|string|max:30',
            'annee' => 'nullable|integer|min:1886|max:' . (date('Y') + 1),
            'kilometrage' => 'nullable|integer|min:0',
            'carrosserie' => 'nullable|string|max:30',
            'energie' => 'nullable|string|max:30',
            'boite' => 'nullable|string|max:30  ',
        ]);
        $vehicule->update($validated);
        return redirect()->route('vehicules.index')->with('success', 'Véhicule mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();
        
        return redirect()->route('vehicules.index')->with('success', 'Véhicule supprimé avec succès.');
    }
}
