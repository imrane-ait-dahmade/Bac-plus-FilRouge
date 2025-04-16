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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('nomEtablissement');
            $table->string('villeEtablissement');
            $table->string('adresseEtablissement');
            $table->string('Universite');
            $table->string('resau');
            $table->integer('nombreEtudiant');
            $table->foreignId('');
            $table->enum('TypeEcole',['Public','Private'])->default('Public');
            $table->foreignId('Region_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
