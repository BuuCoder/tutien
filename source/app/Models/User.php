<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory, Notifiable;

    //The table associated with the model. (string)
    protected $table = 'users';

    //The primary key associated with the table. (string)
    protected $primaryKey = 'user_id';

    //Indicates if the model's ID is auto-incrementing. (bool)
    public $incrementing = true;

    //Indicates if the model should be timestamped. (bool)
    public $timestamps = false;

    //The attributes that are mass assignable. (array)
    protected $fillable = [
        'name',
        'user_name',
        'password',
        'email',
        'user_description',
        'points',
        'money',
        'system_id',
        'level_id',
        'last_login',
        'created_at',
        'updated_at'
    ];
}

