<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Repositories\Badge\BadgeRepositoryInterface;

class BadgeService
{
    protected $badgeRepository;

    public function __construct(BadgeRepositoryInterface $badgeRepository)
    {
        $this->badgeRepository = $badgeRepository;
    }

    public function getAllBadge()
    {
        return $this->badgeRepository->getAllBadge();
    }

    public function checkCacheBadge()
    {
        $minutes = 24 * 60;

        if (!Cache::has('badges_data')) {
            $allBadges = Cache::remember('badges_data', $minutes, function () {
                return $this->getAllBadge();
            });
        } else {
            $allBadges = Cache::get('badges_data');
        }

        $transformedBadgeData = [];

        foreach ($allBadges as $badge) {
            $id = $badge['id'];
            $transformedBadgeData[$id] = [
                'badge_name' => $badge['badge_name'],
                'badge_price' => $badge['badge_price'],
                'badge_description' => $badge['badge_description'],
                'badge_image' => $badge['badge_image'],
                'badge_type' => $badge['badge_type'],
            ];
        }

        return $transformedBadgeData;
    }
}
