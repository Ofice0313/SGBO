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
        Schema::create('materiais', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->string('editora');
            $table->string('ano_de_publicacao');
            $table->string('caminho_do_arquivo');
            $table->string('caminho_da_imagem');
            $table->integer('paginas');
            $table->enum('tipo', ['LIVRO', 'AUDIOLIVRO']);
            $table->enum('status_material', ['DISPONIVEL', 'INDISPONIVEL']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiais');
    }
};
