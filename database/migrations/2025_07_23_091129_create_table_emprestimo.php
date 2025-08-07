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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('material_id')->nullable();
            $table->date('data_de_retirada');
            $table->date('data_de_devolucao')->nullable();
            $table->date('data_limite');
            $table->string('nota_antes_do_emprestimo');
            $table->string('nota_apos_emprestimo');
            $table->integer('unidades');
            $table->decimal('multa', 8, 2)->default(0);
            $table->string('notificacao')->default(false);
            $table->enum('status_emprestimo', ['PENDENTE', 'EMPRESTADO', 'DEVOLVIDO', 'REJEITADO'])->default('PENDENTE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('material_id')->references('id')->on('materiais')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
