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
            $table->string('NomUser');
            $table->string('EmailUser')->unique();
            $table->string('Password');
            $table->string('api_token')->unique();
            $table->rememberToken();
            $table->boolean('statut')->default(false);  // Utilise un booléen pour activer/désactiver le compte
            $table->timestamps();
            $table->softDeletes();  // Permet la suppression douce
            $table->enum('TypeUser', ['admin', 'Equipement', 'Etudiant'])->default('Etudiant');
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
