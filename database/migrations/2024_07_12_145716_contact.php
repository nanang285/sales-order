<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); 
            $table->string('email');
            $table->string('no_telp', 20);
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down(): void
    {
    }
};
