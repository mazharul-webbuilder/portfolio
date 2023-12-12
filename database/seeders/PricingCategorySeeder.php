<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PricingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pricing_categories')->insert([
            [
                'name' => 'Static',
                'constant' => 'static',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'Standard',
                'constant' => 'standard',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'Premium',
                'constant' => 'premium',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
