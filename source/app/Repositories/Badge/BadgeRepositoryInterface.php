<?php

namespace App\Repositories\Badge;

interface BadgeRepositoryInterface
{
    public function getAllBadge();
    public function buy($userId, $badgeId);
    public function sell($userId, $badgeId);
}
