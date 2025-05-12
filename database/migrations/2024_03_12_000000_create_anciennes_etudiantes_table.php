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
        Schema::create('anciennes_etudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('bac_filiere');
            $table->float('note_math')->nullable();
            $table->float('note_pc')->nullable();
            $table->float('note_svt')->nullable();
            $table->float('note_anglais')->nullable();
            $table->float('note_philosophie')->nullable();
            $table->float('note_arabe')->nullable();
            $table->float('note_francais')->nullable();
            $table->float('note_islamic')->nullable();
            $table->float('note_histoire')->nullable();
            $table->float('note_economie')->nullable();
            $table->float('note_organisation')->nullable();
            $table->float('note_nationale')->nullable();
            $table->float('note_regionale')->nullable();
            $table->string('filiere_postbac');
            $table->string('ecole');
            $table->boolean('reussie')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anciennes_etudiantes');
    }
};
