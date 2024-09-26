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
        Schema::table('employees', function (Blueprint $table) {
            $table->time('jam_masuk_maksimal')->nullable(); // Telat
            $table->time('jam_keluar_minimal')->nullable(); // Jam Keluar Minimal
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn(['jam_masuk', 'jam_keluar']);
        });
    }
};
