<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FixedPriceJob extends Model
{
    protected $table = 'fixed_price_jobs';

    protected $fillable = [
        'id',   // This holds the duration_id
        'price'
    ];

    public $timestamps = false;

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    // Use 'id' as the foreign key pointing to durations.id
    public function duration(): BelongsTo
    {
        return $this->belongsTo(Duration::class, 'id');
    }
}
