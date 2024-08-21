<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

// class RecruitmentSeeder extends Seeder
// {
//     public function run()
//     {
//         $faker = Faker::create('id_ID');
//         $jobTitles = [
//             "Project Manager",
//             "Frontend Developer",
//             "Backend Developer",
//             "UI/UX Developer",
//             "Fullstack Developer",
//             "Mobile Developer",
//             "DevOps Developer",
//             "Quality Assurance",
//             "Quality Control",
//             "Accounting Staff / Tax Staff"
//         ];

//         $recruitments = [];

//         for ($i = 0; $i < 500; $i++) {
//             $recruitments[] = [
//                 'uuid' => Str::uuid(),
//                 'email' => $faker->unique()->safeEmail,
//                 'name' => $faker->name,
//                 'nik' => $faker->unique()->numerify('################'),
//                 'address' => $faker->address,
//                 'phone_number' => $faker->phoneNumber,
//                 'study' => $faker->word,
//                 'position' => $jobTitles[array_rand($jobTitles)],
//                 'salary' => $faker->numberBetween(2000000, 10000000),
//                 'file_path' => 'Profesional CV Resume.pdf',
//                 'created_at' => $faker->dateTimeBetween('-1 month', 'now'),
//                 'updated_at' => $faker->dateTimeBetween('-1 month', 'now'),
//             ];
//         }

//         $chunks = array_chunk($recruitments, 1000);
//         foreach ($chunks as $chunk) {
//             DB::table('recruitments')->insert($chunk);
//         }
//     }
// }
