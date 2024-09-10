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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->enum('division', [
                'Backend Developer',
                'Frontend Developer',
                'UI/UX Depelover',
                'Mobile Developer',
                'Fullstack Depelover',
                'DevOps Developer'
            ]);
            $table->enum('role', [
                'Staff',
                'Instership',
                'Praktik Kerja Lapangan',
                'Lead',
                'Project Manager',
                'Human Resource Development',
                'Finance',
                'Direktur'
            ]);
            $table->unsignedBigInteger('fingerprint_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
