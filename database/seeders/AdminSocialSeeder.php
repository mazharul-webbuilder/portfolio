<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_socials')->insert([
            [
                'admin_id' => getAdmin()->id,
                'name' => 'Facebook',
                'link' => 'https://www.facebook.com/'
            ], [
                'admin_id' => getAdmin()->id,
                'name' => 'Instagram',
                'link' => 'https://www.instagram.com/'
            ], [
                'admin_id' => getAdmin()->id,
                'name' => 'LinkedIn',
                'link' => 'https://bd.linkedin.com/'
            ],
        ]);
    }
}
