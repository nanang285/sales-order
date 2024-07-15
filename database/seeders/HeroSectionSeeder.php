<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run()
    {
        HeroSection::create([
            'title' => 'Partner Digital Untuk Layanan Bisnis Dan Pemerintahan',
            'subtitle' => 'Kami Melayani Jasa Pembuatan Website, Aplikasi, Dan Multimedia.',
            'button_text' => 'Info selengkapnya',
            'image_path' => 'images/client1.png',
        ]);
    }
}