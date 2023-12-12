<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = PortfolioCategory::pluck('id');

        foreach ($portfolios as $portfolioId) {
            Portfolio::create([
                'portfolio_category_id' => $portfolioId,
                'title' => 'Digital Marketo to Their New Office.',
                'short_description' => 'Digital Marketo to Their New Office.',
                'favorite' => 'fasd.']);
        }

    }
}
