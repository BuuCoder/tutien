<?php

namespace App\Repositories\Rank;
use App\Models\Rank;

class EloquentRankRepository implements RankRepositoryInterface
{
    protected $rankModel;
    public function __construct(Rank $rankModel){
        $this->rankModel = $rankModel;
    }

    public function getAllRank(){
        return $this->rankModel
        ->where([
            'rank_active' => 'Y'
        ])->get();
    }
}
