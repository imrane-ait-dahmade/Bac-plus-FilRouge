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
        Schema::table('etablissements', function (Blueprint $table) {

            $table->string('telephone', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('site_web')->nullable();
            $table->string('site_inscription')->nullable();


            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();


            $table->string('logo')->nullable();
            $table->string('image')->nullable();


            $table->string('abreviation', 20)->nullable()->comment('Abréviation ou sigle de l\'établissement');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('etablissements', function (Blueprint $table) {
            // Supprimer les colonnes dans l'ordre inverse
            $table->dropColumn([
                'telephone',
                'fax',
                'site_web',
                'site_inscription',
                'facebook',
                'instagram',
                'linkedin',
                'logo',
                'image',
                'abreviation'
            ]);
        });
    }
};
