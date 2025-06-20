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
        'talent_rating',
        'talent_feedback',
        'client_rating',
        'client_feedback',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'is_completed' => 'boolean',
    ];

    public function getIsCompletedAttribute($value)
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Get all reviews about a client (from talents)
    public static function getClientReviews($client_id)
    {
        return self::whereHas('job', function($query) use ($client_id) {
            $query->where('user_id', $client_id);
        })
        ->whereNotNull('client_rating')
        ->whereNotNull('client_feedback')
        ->get();
    }

    // Count the number of reviews for a client
    public static function countClientReviews($client_id)
    {
        return self::whereHas('job', function($query) use ($client_id) {
            $query->where('user_id', $client_id);
        })
            ->whereNotNull('talent_feedback')
            ->count();
    }

    // Count the number of job posts for a client
    public static function countClientPosts($client_id)
    {
        return Job::where('user_id', $client_id)->count();
    }

    // Count the number of hires for a client
    public static function countClientHires($client_id)
    {
        return self::whereHas('job', function($query) use ($client_id) {
            $query->where('user_id', $client_id);
        })->count();
    }

    public static function getTatlentAverageRating($talent_id)
    {
        $avg = self::whereHas('job', function($query) use ($talent_id) {
            $query->where('user_id', $talent_id);
        })
            ->whereNotNull('talent_rating')
            ->avg('talent_rating');

        return $avg ? round($avg, 1) : 0;
    }

}
