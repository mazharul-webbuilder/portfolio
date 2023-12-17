<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pricingCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PricingCategory::class);
    }
}
