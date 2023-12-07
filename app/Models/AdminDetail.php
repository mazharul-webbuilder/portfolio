<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminDetail extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
