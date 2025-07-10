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
        Schema::create('usuarios', function(Blueprint $table){
            $table->id();
            $table->string('nome')->nullable();
            $table->string('endereco')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->unique();
            $table->boolean('status');
            $table->string('password');
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->enum('instituicao', ['LORE', 'FOCO', 'ISLORE'])->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
