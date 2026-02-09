<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techniciens = \App\Models\Technicien::all();
        return view('techniciens.index', compact('techniciens'));
    }

    public function create()
    {
        return view('techniciens.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'nullable|string|max:255',
        ]);

        \App\Models\Technicien::create($validated);

        return redirect()->route('techniciens.index')->with('success', 'Technicien ajouté avec succès.');
    }

    public function show(string $id)
    {
        $technicien = \App\Models\Technicien::findOrFail($id);
        return view('techniciens.show', compact('technicien'));
    }

    public function edit(string $id)
    {
        $technicien = \App\Models\Technicien::findOrFail($id);
        return view('techniciens.edit', compact('technicien'));
    }

    public function update(Request $request, string $id)
    {
        $technicien = \App\Models\Technicien::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'nullable|string|max:255',
        ]);

        $technicien->update($validated);

        return redirect()->route('techniciens.index')->with('success', 'Technicien mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $technicien = \App\Models\Technicien::findOrFail($id);
        $technicien->delete();

        return redirect()->route('techniciens.index')->with('success', 'Technicien supprimé avec succès.');
    }
}