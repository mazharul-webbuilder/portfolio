<?php

namespace Database\Seeders;

use App\Models\Pricing;
use App\Models\PricingCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pricingCategories = PricingCategory::pluck('id');

        foreach ($pricingCategories as $pricingCategoryId) {
            Pricing::create([
                'pricing_category_id' => $pricingCategoryId,
                'title' => 'Make Your Single Page',
                'short_description' => 'Make Your Single Page',
                'long_description' => '1 Page with Elementor

                                        Design Customization

                                        Responsive Design

                                        Content Upload

                                        Design Customization

                                        2 Plugins/Extensions

                                        multipage Elementor

                                        Design Figma

                                        MAintaine Design

                                        Content Upload

                                        Design With XD

                                        8 Plugins/Extensions',
                'total_price' => random_int(10, 50),
            ]);
        }
    }
}
