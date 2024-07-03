<?php

namespace App\Services;

use App\Repositories\CheckIn\CheckInRepositoryInterface;

class CheckInService
{
    protected $checkInRepository;
    public function __construct(CheckInRepositoryInterface $checkInRepository)
    {
        $this->checkInRepository = $checkInRepository;
    }

    public function getCheckIn($userId)
    {
        return $this->checkInRepository->getCheckIn($userId);
    }

    public function checkIn($userId)
    {
        $checkIn = $this->checkInRepository->getCheckIn($userId);

        if (is_null($checkIn)) {
            return $this->checkInRepository->createCheckIn($userId);
        }

        return $this->checkInRepository->updateCheckIn($userId);
    }
}

