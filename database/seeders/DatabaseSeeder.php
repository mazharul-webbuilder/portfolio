<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();
        $this->call(AdminSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MetaSeeder::class);
        $this->call(AdminDetailSeeder::class);
        Model::reguard();
    }
}
