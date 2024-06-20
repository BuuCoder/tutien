<?php

namespace App\Repositories\Garden;

interface GardenRepositoryInterface
{
    public function getAllPot();
    public function checkPot($userId);
    public function grow($userId, $potId);
    public function harvest($userId, $potId);
}
