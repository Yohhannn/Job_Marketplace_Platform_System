<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'role_category_id',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'role_id');
    }
}
