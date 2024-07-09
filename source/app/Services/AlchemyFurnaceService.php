<?php

namespace App\Services;

use App\Repositories\AlchemyFurnace\AlchemyFurnaceRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class AlchemyFurnaceService
{
    protected $alchemyFurnaceRepository;
    public function __construct(
        AlchemyFurnaceRepositoryInterface $alchemyFurnaceRepository
    ){
        $this->alchemyFurnaceRepository = $alchemyFurnaceRepository;
    }

    public function getAllFurnaces()
    {
        return $this->alchemyFurnaceRepository->getAllFurnaces();
    }

    public function checkCacheFurnaces()
    {
        $minutes = 24 * 60;

        if (!Cache::has('furnaces_data')) {
            $furnaces = Cache::remember('furnaces_data', $minutes, function () {
                return $this->getAllFurnaces();
            });
        } else {
            $furnaces = Cache::get('furnaces_data');
        }

        $transformedFurnaceData = [];

        foreach ($furnaces as $furnace) {
            $id = $furnace['id'];
            $transformedFurnaceData[$id] = [
                'name' => $furnace['name'],
                'image' => $furnace['image'],
                'usage_fee' => $furnace['usage_fee'],
                'time_reduction_percentage' => $furnace['time_reduction_percentage'],
            ];
        }

        return $transformedFurnaceData;
    }

}
