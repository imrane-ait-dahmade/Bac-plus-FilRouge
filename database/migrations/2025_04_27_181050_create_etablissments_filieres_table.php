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
        Schema::create('etablissments_filieres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etablissement_id')
                ->constrained()
                ->onDelete('cascade');  // Ajout de la contrainte onDelete('cascade')
            $table->foreignId('filiere_id')
                ->constrained()
                ->onDelete('cascade');  // Ajout de la contrainte onDelete('cascade')
            $table->timestamps();  // Ajout des timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissments_filieres');
    }
};
