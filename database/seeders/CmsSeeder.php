<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cms')->insert([
            'home_banner_img'=> 'frontend/assets/images/banner.jpg',
            'app_logo'=> 'frontend/assets/images/logo.png',
            'footer_about'=> 'Phasellus porttitor sapien a purus venenatis condimentum. Nunc lectus ipsum, laoreet ut efficitur.',
            'facebook_url'=> 'https://www.facebook.com',
            'twitter_url'=> 'https://www.twitter.com',
            'instagram_url'=> 'https://www.instagram.com',
            'youtube_url'=> 'https://www.youtube.com',
            'company_name'=> 'Zakirsoft',
            'company_url'=> 'https://zakirsoft.com',
        ]);
    }
}
