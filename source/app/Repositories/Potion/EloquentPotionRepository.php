<?php

namespace App\Repositories\Potion;

use App\Models\Potion;

class EloquentPotionRepository implements PotionRepositoryInterface
{
    public function getAllPotions()
    {
        return Potion::all();
    }
}
