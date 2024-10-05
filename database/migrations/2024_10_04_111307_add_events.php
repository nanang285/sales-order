<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('description');
            $table->string('slug')->unique();
            $table->text('image_path');
            $table->dateTime('waktu');
            $table->enum('type', ['gratis', 'berbayar']);
            $table->decimal('harga', 10, 2)->nullable();
            $table->string('pilihan_sesi')->nullable();
            $table->string('kategori')->nullable();
            $table->enum('status_quota', ['unlimited', 'limited']);
            $table->integer('quota')->nullable();
            $table->string('lokasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
