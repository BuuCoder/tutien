<?php

namespace App\Repositories\Badge;

use App\Models\Badge;

class EloquentBadgeRepository implements BadgeRepositoryInterface
{
    protected $modelBadge;

    public function __construct(Badge $modelBadge)
    {
        $this->modelBadge = $modelBadge;
    }

    public function getAllBadge()
    {
        try {
            $allBadge = $this->modelBadge->where('badge_buy', 'Y')->get();
            if ($allBadge) {
                return $allBadge;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
