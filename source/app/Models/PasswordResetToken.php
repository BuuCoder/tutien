<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $fillable = ['email', 'token', 'created_at'];

    public $timestamps = false;
}

