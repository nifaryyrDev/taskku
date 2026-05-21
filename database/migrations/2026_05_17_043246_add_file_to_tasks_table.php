<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        // Cek apakah kolom file belum ada
        if (!Schema::hasColumn('tasks', 'file')) {

            Schema::table('tasks', function (Blueprint $table) {

                /*
                |--------------------------------------------------------------------------
                | Upload File PDF
                |--------------------------------------------------------------------------
                */

                $table->string('file')
                      ->nullable()
                      ->after('title');

            });
        }
    }

    /**
     * Hapus migration.
     */
    public function down(): void
    {
        // Cek apakah kolom file ada
        if (Schema::hasColumn('tasks', 'file')) {

            Schema::table('tasks', function (Blueprint $table) {

                $table->dropColumn('file');

            });
        }
    }
};