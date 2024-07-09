<?php

namespace App\Services;

use App\Repositories\AlchemyFurnace\AlchemyFurnaceRepositoryInterface;
use App\Repositories\CraftPotion\CraftPotionRepositoryInterface;
use App\Repositories\Potion\PotionRepositoryInterface;

class CraftPotionService
{
    protected $craftPotionRepository;
    protected $potionRepository;
    protected $alchemyFurnaceRepository;

    public function __construct(
        CraftPotionRepositoryInterface $craftPotionRepository,
        PotionRepositoryInterface $potionRepository,
        AlchemyFurnaceRepositoryInterface $alchemyFurnaceRepository
    ) {
        $this->craftPotionRepository = $craftPotionRepository;
        $this->potionRepository = $potionRepository;
        $this->alchemyFurnaceRepository = $alchemyFurnaceRepository;
    }

    public function craftPotion($userId, $potionId, $furnaceId)
    {
        return $this->craftPotionRepository->craftPotion($userId, $potionId, $furnaceId);
    }

    public function getUserPotions($userId)
    {
        $userPotions = $this->craftPotionRepository->getUserPotions($userId);
        $result = [];
        foreach ($userPotions as $userPotion) {
            $result[$userPotion['furnace_id']] = [
                'potion_name' => $userPotion['potion']['name'],
                'created_at' => $userPotion['created_at'],
                'crafting_time' => $userPotion['crafting_time'],
            ];
        }

        return $result;
    }

    public function collectPotion($userId, $furnaceId)
    {
        return $this->craftPotionRepository->collectPotion($userId, $furnaceId);
    }
}
