<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('jenis_produk');
            $table->string('nama_lengkap');
            $table->string('nama_perusahaan');
            $table->string('jabatan');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_telp');
            $table->decimal('harga', 10, 2);
            $table->string('kode_invoice')->unique();
            $table->string('image_path')->nullable();
            $table->timestamp('waktu')->nullable();
            $table->string('type');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
