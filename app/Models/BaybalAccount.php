<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaybalAccount extends Model
{
    protected $table = 'baybal_accounts';

    protected $fillable = [
        'email',
        'password',
    ];

    public function sentTransactions()
    {
        return $this->hasMany(Transaction::class, 'sender_code');
    }

    public function receivedTransactions()
    {
        return $this->hasMany(Transaction::class, 'receiver_code');
    }
}
