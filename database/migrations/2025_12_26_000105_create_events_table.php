<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Avoid creating the table again if it already exists (this project had an earlier events migration)
        if (Schema::hasTable('events')) {
            return;
        }

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->timestamp('data_evento')->nullable();
            $table->unsignedBigInteger('imagem_id')->nullable();
            $table->string('status')->default('rascunho');
            $table->unsignedBigInteger('autor_id')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->foreign('imagem_id')->references('id')->on('images')->onDelete('set null');
            $table->foreign('autor_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
