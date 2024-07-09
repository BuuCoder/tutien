<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPotion extends Model
{
    use HasFactory;

    protected $table = 'user_potion';

    protected $fillable = [
        'user_id',
        'potion_id',
        'furnace_id',
        'created_at',
        'crafting_time'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function potion()
    {
        return $this->belongsTo(Potion::class, 'potion_id');
    }

    public function alchemyFurnace()
    {
        return $this->belongsTo(AlchemyFurnace::class, 'furnace_id');
    }
}
