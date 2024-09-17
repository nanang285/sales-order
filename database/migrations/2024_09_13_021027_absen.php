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
    Schema::create('absens', function (Blueprint $table) {
        $table->id(); 
        $table->date('date');
        $table->time('time_in')->nullable();
        $table->time('time_out')->nullable();
        $table->string('keterangan')->default('Tidak Hadir');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absens');
    }
};
