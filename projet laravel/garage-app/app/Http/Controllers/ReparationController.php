<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reparations = \App\Models\Reparation::with(['vehicule', 'technicien'])->orderBy('date', 'desc')->get();
        return view('reparations.index', compact('reparations'));
    }

    public function create()
    {
        $vehicules = \App\Models\Vehicule::all();
        $techniciens = \App\Models\Technicien::all();
        return view('reparations.create', compact('vehicules', 'techniciens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'nullable|exists:techniciens,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'nullable|integer|min:0',
            'objet_reparation' => 'required|string',
        ]);

        \App\Models\Reparation::create($validated);

        return redirect()->route('reparations.index')->with('success', 'Réparation enregistrée avec succès.');
    }

    public function show(string $id)
    {
        $reparation = \App\Models\Reparation::with(['vehicule', 'technicien'])->findOrFail($id);
        return view('reparations.show', compact('reparation'));
    }

    public function edit(string $id)
    {
        $reparation = \App\Models\Reparation::findOrFail($id);
        $vehicules = \App\Models\Vehicule::all();
        $techniciens = \App\Models\Technicien::all();
        return view('reparations.edit', compact('reparation', 'vehicules', 'techniciens'));
    }

    public function update(Request $request, string $id)
    {
        $reparation = \App\Models\Reparation::findOrFail($id);

        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'nullable|exists:techniciens,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'nullable|integer|min:0',
            'objet_reparation' => 'required|string',
        ]);

        $reparation->update($validated);

        return redirect()->route('reparations.index')->with('success', 'Réparation mise à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $reparation = \App\Models\Reparation::findOrFail($id);
        $reparation->delete();

        return redirect()->route('reparations.index')->with('success', 'Réparation supprimée avec succès.');
    }
}