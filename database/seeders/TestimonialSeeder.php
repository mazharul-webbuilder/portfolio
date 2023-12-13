<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->insert([
            [
                'name' => 'John Doe',
                'organization_name' => 'Amazon',
                'designation' => 'Marketing Officer',
                'department_name' => 'Sales & Marketing',
                'bio' => 'This is short bio',
                'short_description' => 'When managment is so important. Ut tincidunt est ac dolor aliquam sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mau hendrerit ante. Ut tincidunt est ac dolor aliquam sodales phasellus smau.',
                'rating' => 5.6,
            ],[
                'name' => 'John Smith',
                'organization_name' => 'Facebook',
                'designation' => 'Sales Officer',
                'department_name' => 'Sales & Marketing',
                'bio' => 'This is short bio',
                'short_description' => 'When managment is so important. Ut tincidunt est ac dolor aliquam sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mau hendrerit ante. Ut tincidunt est ac dolor aliquam sodales phasellus smau.',
                'rating' => 3.6,
            ],[
                'name' => 'Tailor Otweel',
                'organization_name' => 'Walmart',
                'designation' => 'HR manager',
                'department_name' => 'Sales & Marketing',
                'bio' => 'This is short bio',
                'short_description' => 'When managment is so important. Ut tincidunt est ac dolor aliquam sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mau hendrerit ante. Ut tincidunt est ac dolor aliquam sodales phasellus smau.',
                'rating' => 8.6,
            ],
        ]);
    }
}
