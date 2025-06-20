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
        Schema::create('universites', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('directeur');
            $table->foreignId('region_id')->constrained('regions');
            $table->string('logo')->nullable();
            $table->enum('type', ['public', 'prive'])->default('public');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universites');
    }
};
