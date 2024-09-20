<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeesSeeder extends Seeder
{
    public function run()
    {
        $names = ['Adit', 'Bintang', 'Cahya', 'Dian', 'Eka', 'Fani', 'Gilang', 'Hadi', 'Indah', 'Jaya', 'Kirana', 'Laras', 'Maya', 'Nina', 'Oka', 'Putri', 'Rizal', 'Sari', 'Tari', 'Udin', 'Vina', 'Wira', 'Yulia', 'Zaki', 'Anisa', 'Beni', 'Cinta', 'Dina', 'Edi', 'Fikri', 'Gita', 'Hendra', 'Ika', 'Juli', 'Kris', 'Lina', 'Meli', 'Nando', 'Ovi', 'Pandu', 'Rani', 'Sinta', 'Tino', 'Uli', 'Vina', 'Wina', 'Yani', 'Zara', 'Agus', 'Bima', 'Cathy', 'Dewa', 'Evi', 'Fahmi', 'Gian', 'Husna', 'Ira', 'Jari', 'Kiki', 'Lia', 'Mita', 'Novi', 'Omar', 'Putu', 'Rara', 'Santi', 'Tasya', 'Ucha', 'Vina', 'Widi', 'Yusuf', 'Zul', 'Ayu', 'Bimo', 'Cici', 'Dona', 'Erik', 'Fika', 'Gian', 'Hadi', 'Ika', 'Jari', 'Kiki', 'Lina', 'Mita', 'Novi', 'Ovi', 'Pandu', 'Rani', 'Sari', 'Tino', 'Ucha', 'Vina', 'Widi', 'Yani', 'Zara'];

        $roles = ['Staff', 'Internship', 'Lead', 'Project Manager', 'Human Resource Development', 'Finance', 'Direktur'];

        $divisions = ['Backend Developer', 'Frontend Developer', 'Mobile Developer', 'Fullstack Developer', 'DevOps Developer', 'UI/UX Developer'];

        $employees = [];
        for ($i = 0; $i < 100; $i++) {
            $employees[] = [
                'id' => (string) Str::uuid(),
                'name' => $names[array_rand($names)],
                'division' => $divisions[array_rand($divisions)],
                'role' => $roles[array_rand($roles)],
                'fingerprint_id' => $i + 1,
            ];
        }

        DB::table('employees')->insert($employees);
    }
    // php artisan db:seed --class=EmployeesSeeder
}
