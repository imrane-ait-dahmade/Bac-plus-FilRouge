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
        Schema::create('bacs', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->enum('type', ['science','economie','literraire'])->default('science');
            $table->string('langue');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bacs');
    }
};
