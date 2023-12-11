<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('features')->insert([
            [
                'title' => 'Business Strategy',
                'description' => 'I throw myself down among the tall grass by the stream as I lie close to the earth',
            ], [
                'title' => 'Marketing',
                'description' => ' It uses a dictionary of over 200 Latin words, combined with a handful of model sentence.',
            ], [
                'title' => 'Networking',
                'description' => 'I throw myself down among the tall grass by the stream as I lie close to the earth.',
            ], [
                'title' => 'Selling',
                'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority.',
            ], [
                'title' => 'Motivation',
                'description' => 'always free from repetition, injected humour, or non-characteristic words etc.',
            ], [
                'title' => 'Leading',
                'description' => ' It uses a dictionary of over 200 Latin words, combined with a handful of model sentence.',
            ],
        ]);
    }
}
