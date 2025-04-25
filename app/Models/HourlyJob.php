<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HourlyJob extends Model
{
    protected $table = 'hourly_jobs';

    protected $fillable = [
        'rate_min',
        'rate_max',
        'weekly_hours_limit',
        'duration_id',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
