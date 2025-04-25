<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    protected $table = 'durations';

    protected $fillable = [
        'name',
    ];
}
