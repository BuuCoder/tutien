<?php

namespace App\Repositories\Mine;

interface MineRepositoryInterface
{
    public function getLastMine(int $userId);
    public function mine(int $userId);
}
