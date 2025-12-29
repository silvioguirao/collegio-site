<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('boletins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id')->nullable();
            $table->string('periodo');
            $table->json('notas')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();

            $table->foreign('aluno_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('boletins');
    }
};
