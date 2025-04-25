<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'email',
        'contact_number',
        'country_id',
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

    public function jobs()
    {
        return $this->hasMany(Job::class, 'client_id');
    }
}
