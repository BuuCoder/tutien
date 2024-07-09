<?php

namespace App\Repositories\AlchemyFurnace;

use App\Models\AlchemyFurnace;

class EloquentAlchemyFurnaceRepository implements AlchemyFurnaceRepositoryInterface
{
    public function getAllFurnaces()
    {
        return AlchemyFurnace::all();
    }
}
