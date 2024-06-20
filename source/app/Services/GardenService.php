<?php

namespace App\Services;

use App\Repositories\Garden\GardenRepositoryInterface;

class GardenService
{
    protected $gardenRepository;

    public function __construct(GardenRepositoryInterface $gardenRepository)
    {
        $this->gardenRepository = $gardenRepository;
    }

    public function getAllPot(){
        return $this->gardenRepository->getAllPot();
    }

    public function checkPot($userId){
        return $this->gardenRepository->checkPot($userId);
    }

    public function grow($userId, $potId){
        return $this->gardenRepository->grow($userId, $potId);
    }

    public function harvest($userId, $potId){
        return $this->gardenRepository->harvest($userId, $potId);
    }
}
