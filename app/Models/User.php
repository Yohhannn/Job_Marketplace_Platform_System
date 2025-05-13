<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable; // This trait provides auth-related methods


    public $timestamps = false;
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'contact_number',
        'password',
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
                $this->last_name
            ])
        );
    }

    public function activeProposals()
    {
        return $this->hasMany(Proposal::class, 'user_id')->whereNotIn('status', ['accepted', 'rejected']);
    }

    public function pastProposals()
    {
        return $this->hasMany(Proposal::class, 'user_id')->whereIn('status', ['accepted', 'rejected']);
    }

    public function activeContracts()
    {
        return $this->hasMany(Contract::class, 'user_id')->where('is_completed', false);
    }

    public function pastContracts()
    {
        return $this->hasMany(Contract::class, 'user_id')->where('is_completed', true);
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(
            Skill::class,
            'user_skills',
            'user_id',
            'skill_id'
        );
    }
}
