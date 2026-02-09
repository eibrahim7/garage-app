<?php

namespace Database\Seeders;

use App\Models\Vehicule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;   
use Illuminate\Database\Seeder;

class VehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicule::create([
            'immatriculation' => 'TG-8500-cd',
            'marque' => 'wolkswagen',
            'modele' => 'Golf',
            'couleur' => 'noir',
            'annee' => 2020,
            'kilometrage' => 15000,
            'energie' => 'Essence',
            'boite' => 'Automatique'
        ]);
    }
}
