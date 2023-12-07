<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'title' => 'Admin Title',
            'description' => 'Admin test description',
            'password' => Hash::make(123456),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
