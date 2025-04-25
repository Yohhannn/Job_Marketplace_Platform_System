<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FixedPriceJob extends Model
{
    protected $table = 'fixed_price_jobs';

    protected $fillable = [
        'price',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
