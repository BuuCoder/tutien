<?php

namespace App\Repositories\CraftPotion;

interface CraftPotionRepositoryInterface
{
    public function getUserPotions($userId);
    public function craftPotion($userId, $potionId, $furnaceId);
    public function collectPotion($userId, $furnaceId);
}
