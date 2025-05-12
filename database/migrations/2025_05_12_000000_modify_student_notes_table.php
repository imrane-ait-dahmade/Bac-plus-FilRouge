<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('student_notes', function (Blueprint $table) {
            // Vérifier si la colonne user_id n'existe pas déjà
            if (!Schema::hasColumn('student_notes', 'user_id')) {
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            }

            // Vérifier si la colonne matiere n'existe pas déjà
            if (!Schema::hasColumn('student_notes', 'matiere')) {
                $table->string('matiere');
            }

            // Vérifier si la colonne note n'existe pas déjà
            if (!Schema::hasColumn('student_notes', 'note')) {
                $table->decimal('note', 4, 2);
            }
        });
    }

    public function down(): void
    {
        Schema::table('student_notes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'matiere', 'note']);
        });
    }
};
