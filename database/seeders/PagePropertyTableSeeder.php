<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagePropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('page_properties')->insert([
            // page properties

            [
                'whatsapp_number' => '+0000000',
                'phone_number' => '+0000000',
                'email' => 'admin@gmail.com',
                // 'slider_image1' => 'carousel-bg-1.jpg',
                // 'slider_image2' => 'carousel-bg-2.jpg',
                'about_image' => 'about.jpg',
                'opening_hours1' => 'Monday - Friday: 09.00 AM - 09.00 PM',
                'address' => fake()->address,
                'address_link' => fake()->address,
            ],
        ]);
    }
}
