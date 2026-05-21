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
        Schema::create('tasks', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | Primary Key
            |--------------------------------------------------------------------------
            */

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Relasi User
            |--------------------------------------------------------------------------
            */

            $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | Data Tugas
            |--------------------------------------------------------------------------
            */

            // Judul tugas
            $table->string('title');

            // Deskripsi tugas
            $table->text('description')->nullable();

            // Upload file PDF
            $table->string('file')->nullable();

            // Status tugas
            $table->enum('status', [
                'pending',
                'selesai'
            ])->default('pending');

            /*
            |--------------------------------------------------------------------------
            | Timestamp
            |--------------------------------------------------------------------------
            */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};