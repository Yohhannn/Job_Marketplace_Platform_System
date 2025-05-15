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
    public function role_category(){
        return $this->belongsTo(RoleCategory::class, 'role_category_id');
    }
}
