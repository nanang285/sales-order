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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('email')->unique();
            $table->string('name', 50); 
            $table->string('nik',20);
            $table->string('address');
            $table->string('phone_number',20);
            $table->string('study');
            $table->string('position');
            $table->string('salary', 20);
            $table->string('file_path');
            
            //hanya diakses pada storeAdmin
            $table->boolean('stage1')->default(false);
            $table->boolean('stage2')->default(false);
            $table->boolean('stage3')->default(false);
            $table->boolean('stage4')->default(false);
            
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
