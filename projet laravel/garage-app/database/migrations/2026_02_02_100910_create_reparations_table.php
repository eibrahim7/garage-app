<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reparations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicule_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('technicien_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->date('date');
            $table->integer('duree_main_oeuvre')->nullable();
            $table->text('objet_reparation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparations');
    }
};
