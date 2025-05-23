<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    protected $table = 'jobs';
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'id',
        'title',
        'description',
        'role_id',
        'experience_level_id',
        'type',
        'scope',
        'english_level_id',
        'number_of_hires',
        'user_id',
    ];

    protected $hidden = [
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'last_viewed_at' => 'datetime',
        ];
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function role(){
        return$this->belongsTo(Role::class,'role_id');
    }
    public function exp(){
        return$this->belongsTo(ExperienceLevel::class,'experience_level_id');
    }
    public function eng(){
        return$this->belongsTo(ExperienceLevel::class,'english_level_id');
    }
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'job_id');
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(\App\Models\Contract::class, 'job_id');
    }
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(
            Skill::class,
            'job_skills',
            'job_id',
            'skill_id'
        );
    }

    public function hourly()
    {
        return $this->hasOne(HourlyJob::class, 'id');
    }

    public function fixedPrice()
    {
        return $this->hasOne(FixedPriceJob::class, 'id');
    }
}
