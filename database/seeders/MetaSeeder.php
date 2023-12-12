<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metas')->insert([
            'company_name' => 'Demo Company',
            'designation' => 'Chief Marketing Officer',
            'short_description' => 'I am available for freelance work. Connect with me via and call in to my account.',
            'email' => 'example@example.com',
            'phone' => '+15854380045',
        ]);
    }
}
