<?php

namespace App\Services;

use App\Repositories\Potion\PotionRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class PotionService
{
    protected $potionRepository;

    public function __construct(
        PotionRepositoryInterface $potionRepository
    ){
        $this->potionRepository = $potionRepository;
    }

    public function getAllPotions()
    {
        return $this->potionRepository->getAllPotions();
    }

    public function checkCachePotions()
    {
        $minutes = 24 * 60;

        if (!Cache::has('potions_data')) {
            $potions = Cache::remember('potions_data', $minutes, function () {
                return $this->getAllPotions();
            });
        } else {
            $potions = Cache::get('potions_data');
        }

        $transformedPotionData = [];

        foreach ($potions as $potion) {
            $id = $potion['id'];
            $transformedPotionData[$id] = [
                'name' => $potion['name'],
                'image' => $potion['image'],
                'crafting_time' => $potion['crafting_time'],
                'required_ingredients' => $potion['required_ingredients'],
                'reward_points' => $potion['reward_points'],
            ];
        }

        return $transformedPotionData;
    }

}
