<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filieres', function (Blueprint $table) {
            $table->id();
            $table->string('nomFiliere');
            $table->foreignId('etablissement_id')->constrained()->onDelete('cascade');
            $table->enum('Niveau', [
                'Prépa',
                'Mise à niveau',
                'BTS',
                'DUT',
                'DEUST',
                'Licence',
                'Licence Pro',
                'Master',
                'Mastère Spécialisé',
                'Doctorat'
            ]);
            $table->string('ConditionsAdmission');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filieres');
    }
};
