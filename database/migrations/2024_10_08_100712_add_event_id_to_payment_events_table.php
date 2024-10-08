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
        Schema::table('payment_events', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('payment_events', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->dropColumn('event_id');
        });
    }
};
