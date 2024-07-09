<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potion extends Model
{
    use HasFactory;

    protected $table = 'potion';

    protected $fillable = [
        'name',
        'image',
        'crafting_time',
        'required_ingredients',
        'reward_points'
    ];

    public $timestamps = false;

    protected $casts = [
        'required_ingredients' => 'array',
    ];

    public function userPotions()
    {
        return $this->hasMany(UserPotion::class, 'potion_id');
    }
}
