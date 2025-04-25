<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Talent extends Model
{
    protected $table = 'talents';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'email',
        'contact_number',
        'country_id',

        'desc_title',
        'desc_text',
        'experience_level_id',
        'english_level_id',
        'hourly_rate',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'created_at' => 'datetime',
        ];
    }

    protected $appends = [
        'name',
    ];

    public function getNameAttribute(): string
    {
        return implode(' ',
            array_filter([
                $this->first_name,
                $this->middle_name,
                $this->last_name,
                $this->suffix
            ])
        );
    }

    public function activeProposals()
    {
        return $this->hasMany(Proposal::class, 'talent_id')->whereNotIn('status', ['accepted', 'rejected']);
    }

    public function pastProposals()
    {
        return $this->hasMany(Proposal::class, 'talent_id')->whereIn('status', ['accepted', 'rejected']);
    }

    public function activeContracts()
    {
        return $this->hasMany(Contract::class, 'talent_id')->where('is_completed', false);
    }

    public function pastContracts()
    {
        return $this->hasMany(Contract::class, 'talent_id')->where('is_completed', true);
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(
            Skill::class,
            'talent_skills',
            'talent_id',
            'skill_id'
        );
    }
}
