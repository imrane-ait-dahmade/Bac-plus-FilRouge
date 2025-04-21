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
        Schema::table('filieres', function (Blueprint $table) {
           $table->addColumn('string', 'description')->nullable();
           $table->renameColumn('nomFiliere', 'nomfiliere');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('filieres', function (Blueprint $table) {
           $table->renameColumn('nomfiliere', 'nomFiliere');
           $table->dropColumn('description');
       });

    }
};
