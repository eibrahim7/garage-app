<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Vehicule;
use App\Models\Technicien;
use App\Models\Reparation;

class HomeController extends Controller
{
    public function index(): View
    {
        $stats = [
            'vehicules' => Vehicule::count(),
            'techniciens' => Technicien::count(),
            'reparations' => Reparation::count(),
            'dernieres_reparations' => Reparation::with(['vehicule', 'technicien'])->orderBy('date', 'desc')->limit(5)->get(),
        ];
        return view('home', compact('stats'));
    }
}
