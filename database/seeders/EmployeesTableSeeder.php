<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeesTableSeeder extends Seeder
{
    // public function run()
    // {
    //     // Data contoh
    //     $divisions = [
    //         'Backend Developer',
    //         'Frontend Developer',
    //         'UI/UX Developer',
    //         'Mobile Developer',
    //         'Fullstack Developer',
    //         'DevOps Developer'
    //     ];

    //     $roles = [
    //         'Employee',
    //         'Staff',
    //         'Internship',
    //         'Lead',
    //         'Project Manager',
    //         'Human Resource Development',
    //         'Finance',
    //         'Direktur'
    //     ];

    //     // Membuat 10 entri karyawan
    //     for ($i = 0; $i < 50; $i++) {
    //         DB::table('employees')->insert([
    //             'id' => Str::uuid(), // Menghasilkan UUID
    //             'name' => 'Employee ' . ($i + 1),
    //             'division' => $divisions[array_rand($divisions)], // Memilih secara acak divisi
    //             'role' => $roles[array_rand($roles)], // Memilih secara acak peran
    //             'fingerprint_id' => $i + 1, // Fingerprint ID unik
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }
    // }
}
