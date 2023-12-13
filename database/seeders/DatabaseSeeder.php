<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pricing;
use App\Models\PricingCategory;
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
        $this->call(AdminSocialSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(PricingCategorySeeder::class);
        $this->call(PricingSeeder::class);
        $this->call(PortfolioCategorySeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(ExperienceSeeder::class);
        $this->call(ProffessionalSkillSeeder::class);
        $this->call(TestimonialSeeder::class);
        Model::reguard();
    }
}
