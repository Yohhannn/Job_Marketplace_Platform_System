<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    public $timestamps = false;
    protected $table = 'contracts';

    protected $fillable = [
        'job_id',
        'user_id',
        'pay_amount',
        'is_completed',
        'client_rating',
        'client_feedback',
        'talent_rating',
        'talent_feedback',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $appends = [
        'user_id',
    ];

    public function getClientIdAttribute(): int
    {
        return $this->job->user_id;
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

}
