<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientCategoryIds = DB::table('client_categories')->pluck('id');

        foreach ($clientCategoryIds as $categoryId) {
            DB::table('clients')->insert([
                [
                    'client_category_id' => $categoryId,
                    'name' => 'Client 1',
                ],[
                    'client_category_id' => $categoryId,
                    'name' => 'Client 2',
                ],[
                    'client_category_id' => $categoryId,
                    'name' => 'Client 3',
                ],[
                    'client_category_id' => $categoryId,
                    'name' => 'Client 4',
                ],[
                    'client_category_id' => $categoryId,
                    'name' => 'Client 5',
                ],[
                    'client_category_id' => $categoryId,
                    'name' => 'Client 6',
                ],[
                    'client_category_id' => $categoryId,
                    'name' => 'Client 7',
                ],[
                    'client_category_id' => $categoryId,
                    'name' => 'Client 8',
                ],
            ]);
        }
    }
}
