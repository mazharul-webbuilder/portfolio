<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('education')->insert([
           [
               'name' => 'Personal Portfolio April Fools',
               'title' => 'University of DVI (1997 - 2001)',
               'session_from' => '2020',
               'session_to' => '2024',
               'score' => '3.54',
               'description' => 'The education should be very interactual. Ut tincidunt est ac dolor aliquam sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.',
           ]
        ]);
    }
}
