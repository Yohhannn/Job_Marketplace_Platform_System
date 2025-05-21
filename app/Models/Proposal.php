<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proposal extends Model
{
    public $timestamps = false;

    protected $table = 'proposals';

    protected $fillable = [
        'job_id',
        'user_id',
        'bid_amount',
        'duration_id', // Make sure this field exists in DB
        'letter',
        'status',
        'interview_date',
        'interview_time',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function duration(): BelongsTo
    {
        return $this->belongsTo(Duration::class, 'duration_id');
    }
}
