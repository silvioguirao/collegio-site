<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->string('arquivo');
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->string('status')->default('rascunho');
            $table->timestamps();

            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
