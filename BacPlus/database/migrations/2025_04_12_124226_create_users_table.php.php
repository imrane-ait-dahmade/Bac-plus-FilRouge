 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  CreationUser extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('NomUser');
        $table->string('EmailUser')->unique();
        $table->string('Password');
        $table->string('api_token')->unique();
        $table->rememberToken();
        $table->boolean('statut')->default(false);
        $table->timestamps();
        $table->softDeletes();
        $table->enum('TypeUser',['admin' , 'Equipement' , 'Etudiant'])->default('Etudiant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::drop('users');
    }
};
