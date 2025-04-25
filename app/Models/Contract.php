<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    protected $table = 'contracts';

    protected $fillable = [
        'job_id',
        'talent_id',
        'pay_amount',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    protected $appends = [
        'client_id',
    ];

    public function getClientIdAttribute(): int
    {
        return $this->job->client_id;
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
