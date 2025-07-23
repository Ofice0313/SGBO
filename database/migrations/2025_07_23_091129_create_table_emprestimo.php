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
            $table->decimal('multa', 8, 2)->default(0);
            $table->boolean('notificacao')->default(false);
            $table->enum('status_emprestimo', ['PENDENTE', 'EMPRESTADO', 'DEVOLVIDO'])->default('PENDENTE');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('material_id')->references('id')->on('materiais')->onDelete('set null');
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
