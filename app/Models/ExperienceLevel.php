<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceLevel extends Model
{
    protected $table = 'experience_levels';

    protected $fillable = [
        'name',
        'description',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'experience_level_id');
    }
}
