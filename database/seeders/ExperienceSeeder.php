<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experiences')->insert([
            [
                'company_name' => 'Netelmart',
                'designation' => 'Marketer',
                'starting_year' => 2010,
                'ending_year' => 2024,
                'is_current' => false,
                'description' => 'The education should be very interactual. Ut tincidunt est ac dolor aliquam sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.',
            ]
        ]);
    }
}
