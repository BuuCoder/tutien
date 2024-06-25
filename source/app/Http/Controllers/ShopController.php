<?php

namespace App\Http\Controllers;

use App\Services\BadgeService;

class ShopController
{
    protected $badgeService;
    protected $allBadge;

    public function __construct(BadgeService $badgeService)
    {
        $this->badgeService = $badgeService;
        $this->allBadge = $this->badgeService->checkCacheBadge();
    }

    public function index()
    {
        $allBadge = $this->allBadge;
        return view('shop.index',[
            'allBadge' => $allBadge
        ]);
    }
}
