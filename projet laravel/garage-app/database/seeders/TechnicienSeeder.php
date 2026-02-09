<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technicien;


class TechnicienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Technicien::create([
           'nom' => 'TOKO',
           'prenom' => 'Jean',
           'specialite' => 'Mécanique générale',
       ]);  

       Technicien::create([
           'nom' => 'KOUAME',
           'prenom' => 'Marie',
           'specialite' => 'Électronique automobile',
       ]);
       Technicien::create([
           'nom' => 'DIALLO',
           'prenom' => 'Ali',
           'specialite' => 'Carrosserie',
       ]);  
    }
}
