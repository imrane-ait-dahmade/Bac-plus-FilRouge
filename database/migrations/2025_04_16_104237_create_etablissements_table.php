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
            $table->string('nom');
            $table->string('ville');
            $table->string('description');
            $table->string('adresse');
           $table->foreignId('universite_id')->constrained('universites');
            $table->string('resau');
            $table->integer('nombre_etudiant');
            $table->foreignId('region_id')->constrained();
            $table->enum('TypeEcole',['public','prive'])->default('public');
            $table->string('telephone', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('site_web')->nullable();
            $table->string('site_inscription')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->string('abreviation', 20)->nullable();
            $table->boolean('seuil_actif')->default(false);
            $table->float('seuil')->nullable();
            $table->float('reputation');
            $table->decimal('frais_scolarite', 8, 2)->nullable();
            $table->date('date_ouverture_inscription')->nullable();
            $table->date('date_limite_inscription')->nullable();
            $table->timestamps();
            $table->string('diplome_type')->nullable();
            $table->string('email')->nullable();
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
