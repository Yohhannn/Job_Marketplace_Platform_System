<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnglishLevel extends Model
{
    protected $table = 'english_levels';

    protected $fillable = [
        'name',
    ];
}
