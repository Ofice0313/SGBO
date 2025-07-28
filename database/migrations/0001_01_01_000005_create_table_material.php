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
            $table->unsignedBigInteger('subcategoria_id');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('cascade');
            $table->string('titulo')->unique();
            $table->string('autor');
            $table->string('editora')->nullable();
            $table->string('ano_de_publicacao')->nullable();
            $table->string('caminho_do_arquivo')->nullable();
            $table->string('caminho_do_audio')->nullable();
            $table->string('caminho_da_imagem')->nullable();
            $table->integer('paginas');
            $table->integer('minutos')->nullable();
            $table->enum('tipo', ['LIVRO', 'AUDIOLIVRO', 'ARTIGO', 'REVISTA'])
                ->default('LIVRO');
            $table->enum('status_material', ['DISPONIVEL', 'INDISPONIVEL']);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();  
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
