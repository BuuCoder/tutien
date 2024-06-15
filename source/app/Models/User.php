<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'points', 'rank', 'balance', 'inventory',
        'address', 'phone_number', 'last_login'
    ];

    protected $casts = [
        'inventory' => 'json',
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}

