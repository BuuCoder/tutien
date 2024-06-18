<?php

namespace App\Repositories\CheckIn;

interface CheckInRepositoryInterface
{
    public function getCheckIn($userId);
    public function createCheckIn(int $userId);
    public function updateCheckIn(int $userId);
}
