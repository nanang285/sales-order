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
        Schema::table('recruitments', function (Blueprint $table) {
            $table->string('onsite');
            $table->string('test');
            $table->date('join');
            $table->string('portfolio')->nullable();
        });
    }

    public function down()
    {
        Schema::table('recruitments', function (Blueprint $table) {
            $table->dropColumn(['onsite', 'test', 'join']);
        });
    }
};
