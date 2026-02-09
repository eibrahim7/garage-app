<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reparation;
use App\Models\Vehicule;
use App\Models\Technicien;  

class ReparationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicule = Vehicule::first();
        $technicien = Technicien::first();

        if ($vehicule && $technicien) {
            Reparation::create([
                'vehicule_id' => $vehicule->id,
                'technicien_id' => $technicien->id,
                'date' => now(),
                'duree_main_oeuvre' => 30,
                'objet_reparation' => 'Changement des plaquettes de frein',
            ]);
        }
    }
}
