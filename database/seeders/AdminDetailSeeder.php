<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = DB::table('admins')->first();

        DB::table('admin_details')->insert([
            'admin_id' => $admin->id,
            'small_title' => 'WELCOME TO MY WORLD',
            'name_to_show' => 'Jone Lee',
            'slogan_1' => 'Marketer',
            'slogan_2' => 'Networker',
            'slogan_3' => 'Business Planner',
            'short_description' => 'I use animation as a third dimension by which to simplify experiences and kuiding thro each and every interaction. I’m not adding motion just to spruce things up, but doing it in ways that.',
        ]);
    }
}
