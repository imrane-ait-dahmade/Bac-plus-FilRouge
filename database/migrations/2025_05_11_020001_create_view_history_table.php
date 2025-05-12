<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('view_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('etablissement_id')->constrained()->onDelete('cascade');
            $table->timestamp('viewed_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('view_history');
    }
};
