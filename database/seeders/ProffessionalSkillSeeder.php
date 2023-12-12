<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProffessionalSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proffessional_skills')->insert([
            [
            'title' => 'Ms Word',
            'value' => 95
            ],[
            'title' => 'Ms Excel',
            'value' => 80
            ],[
            'title' => 'PowerPont',
            'value' => 60
            ],
        ]);
    }
}
