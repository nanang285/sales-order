<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RecruitmentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $recruitments = [];

        for ($i = 0; $i < 10; $i++) { // Adjust the number of records as needed
            $recruitments[] = [
                'uuid' => Str::uuid(),
                'email' => $faker->unique()->safeEmail,
                'name' => $faker->name,
                'nik' => $faker->unique()->numerify('################'),
                'address' => $faker->address,
                'phone_number' => $faker->numerify('###########'), // Max 15 digits
                'study' => $faker->word,
                'position' => $faker->word,
                'onsite' => 'Ya',
                'test' => 'Ya',
                'agree' => $faker->date(), // Agree as a date
                'salary' => $faker->numberBetween(2000000, 10000000),
                'portfolio' => null,
                'file_path' => 'Profesional CV Resume.pdf',
                'stage1' => '0',
                'stage2' => '0',
                'stage3' => '0',
                'stage4' => '0',
                'failed_stage' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('recruitments')->insert($recruitments);
    }
}
