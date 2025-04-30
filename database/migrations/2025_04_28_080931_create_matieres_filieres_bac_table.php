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
        Schema::create('matieres_filieres_bac', function (Blueprint $table) {
            $table->id();
           $table->foreignId('matiere_id')->constrained();
           $table->foreignId('filieres_bac_id')->constrained('filieres_bac');


//            $table->foreign('filieres_bac_id')->references('id')->on('filieres_bac');
           $table->integer('Coefiecient');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matieres_filieres_bac');
    }
};
