<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return  new class  extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('statut')->default(false);  // Utilise un booléen pour activer/désactiver le compte
            $table->timestamps();
            $table->softDeletes();  // Permet la suppression douce
            $table->enum('role', ['admin', 'etudiant'])->default('etudiant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');  // Utiliser dropIfExists pour éviter l'erreur si la table n'existe pas
    }
};
