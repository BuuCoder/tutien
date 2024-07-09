<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlchemyFurnace extends Model
{
    use HasFactory;

    protected $table = 'alchemy_furnace';

    protected $fillable = [
        'name',
        'image',
        'usage_fee',
        'time_reduction_percentage'
    ];

    public $timestamps = false;

    public function userPotions()
    {
        return $this->hasMany(UserPotion::class, 'furnace_id');
    }
}
