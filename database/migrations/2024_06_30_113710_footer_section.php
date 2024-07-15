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
        Schema::create('footer_sections', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->text('sosmed_1');
            $table->text('sosmed_2');
            $table->text('sosmed_3');
            $table->text('sosmed_4');
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
