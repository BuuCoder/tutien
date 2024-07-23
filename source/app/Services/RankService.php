<?php

namespace App\Services;

use App\Repositories\Rank\RankRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class RankService
{
    protected $rankRepository;

    public function __construct(RankRepositoryInterface $rankRepository)
    {
        $this->rankRepository = $rankRepository;
    }

    public function checkCacheRanks()
    {
        $minutes = 24 * 60;

        if (!Cache::has('rank_data')) {
            $ranks = Cache::remember('rank_data', $minutes, function () {
                return $this->rankRepository->getAllrank();
            });
        } else {
            $ranks = Cache::get('rank_data');
        }

        $transformedItemData = [];

        foreach ($ranks as $rank) {
            $id = $rank['rank_id'];
            $transformedItemData[$id] = [
                'rank_name' => $rank['rank_name'],
                'rank_class_name' => $rank['rank_class_name'],
                'rank_milestone' => $rank['rank_milestone'],
                'rank_num' => $rank['rank_num'],
                'rank_awards' => $rank['rank_awards'],
                'system_id' => $rank['system_id'],
            ];
        }

        return $transformedItemData;
    }
}
