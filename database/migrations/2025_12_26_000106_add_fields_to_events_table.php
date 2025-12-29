<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (! Schema::hasColumn('events', 'imagem_id')) {
                $table->unsignedBigInteger('imagem_id')->nullable()->after('data_evento');
                $table->foreign('imagem_id')->references('id')->on('images')->onDelete('set null');
            }

            if (! Schema::hasColumn('events', 'autor_id')) {
                $table->unsignedBigInteger('autor_id')->nullable()->after('status');
                $table->foreign('autor_id')->references('id')->on('users')->onDelete('set null');
            }

            if (! Schema::hasColumn('events', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('autor_id');
            }

            if (! Schema::hasColumn('events', 'status')) {
                $table->string('status')->default('rascunho')->after('imagem_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('events', 'autor_id')) {
                $table->dropForeign(['autor_id']);
                $table->dropColumn('autor_id');
            }
            if (Schema::hasColumn('events', 'imagem_id')) {
                $table->dropForeign(['imagem_id']);
                $table->dropColumn('imagem_id');
            }
            if (Schema::hasColumn('events', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};