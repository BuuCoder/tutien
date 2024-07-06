<?php

namespace App\Services;

use App\Repositories\Mine\MineRepositoryInterface;

class MineService
{
    protected $mineRepository;

    public function __construct(MineRepositoryInterface $mineRepository){
        $this->mineRepository = $mineRepository;
    }

    public function getLastMine(int $userId){
        return $this->mineRepository->getLastMine($userId);
    }
    public function mine(int $userId){
        return $this->mineRepository->mine($userId);
    }
}
