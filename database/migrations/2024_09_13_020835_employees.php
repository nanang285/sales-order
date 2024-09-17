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
            'UI/UX Developer',
            'Mobile Developer',
            'Fullstack Developer',
            'DevOps Developer'
        ])->nullable();
        $table->enum('role', [
            'Employee',
            'Staff',
            'Internship',
            'Lead',
            'Project Manager',
            'Human Resource Development',
            'Finance',
            'Direktur'
        ])->nullable();
        $table->unsignedBigInteger('fingerprint_id')->nullable()->unique();
        $table->timestamps();
        
        $table->index('fingerprint_id');
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
