<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('client_categories')->insert([
            [
                'name' => 'Development'
            ],[
                'name' => 'Market Research'
            ],[
                'name' => 'Design'
            ],  [
                'name' => 'Field Work'
            ],[
                'name' => 'Leadership'
            ],[
                'name' => 'Networking'
            ],
        ]);
    }
}
