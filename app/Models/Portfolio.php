<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
      'portfolio_category_id',
      'title',
      'favorite',
      'short_description',
    ];

    public function portfolioCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PortfolioCategory::class);
    }
}
