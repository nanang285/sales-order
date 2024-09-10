<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueConstraintToEmployeesFingerprintId extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unique('fingerprint_id');
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropUnique(['fingerprint_id']);
        });
    }
}
