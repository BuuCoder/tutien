<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;

    //The table associated with the model. (string)
    protected $table = 'check_ins';

    //The primary key associated with the table. (string)
    protected $primaryKey = 'user_id';

    //Indicates if the model's ID is auto-incrementing. (bool)
    public $incrementing = true;

    //The attributes that are mass assignable. (array)
    protected $fillable = [
        'user_id',
        'before_checkin',
        'count_checkin',
        'received_gift',
        'created_at'
    ];

}
