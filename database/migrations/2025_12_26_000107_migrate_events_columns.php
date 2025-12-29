<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (! Schema::hasColumn('events', 'titulo')) {
                $table->string('titulo')->nullable()->after('id');
            }
            if (! Schema::hasColumn('events', 'descricao')) {
                $table->text('descricao')->nullable()->after('titulo');
            }
            if (! Schema::hasColumn('events', 'data_evento')) {
                $table->timestamp('data_evento')->nullable()->after('descricao');
            }
        });

        // Copy existing data from old column names if present
        if (Schema::hasColumn('events', 'title')) {
            DB::table('events')->whereNull('titulo')->update(['titulo' => DB::raw('title')]);
        }
        if (Schema::hasColumn('events', 'description')) {
            DB::table('events')->whereNull('descricao')->update(['descricao' => DB::raw('description')]);
        }
        if (Schema::hasColumn('events', 'date')) {
            DB::table('events')->whereNull('data_evento')->update(['data_evento' => DB::raw('date')]);
        }
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'data_evento')) {
                $table->dropColumn('data_evento');
            }
            if (Schema::hasColumn('events', 'descricao')) {
                $table->dropColumn('descricao');
            }
            if (Schema::hasColumn('events', 'titulo')) {
                $table->dropColumn('titulo');
            }
        });
    }
};