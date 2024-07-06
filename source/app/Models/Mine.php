<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mine extends Model
{
    use HasFactory;

    protected $table = 'mine';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'mined_at',
    ];
}
