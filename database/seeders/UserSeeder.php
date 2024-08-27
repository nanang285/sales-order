<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin ZMI',
            'email' => 'zenweb.verifikasi@gmail.com',
            'password' => Hash::make('adminzmi@2024'),
            'role' => 'admin',
        ]);
    }
}
