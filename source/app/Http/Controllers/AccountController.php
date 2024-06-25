<?php

namespace App\Http\Controllers;

use App\Services\BadgeService;
use App\Services\ItemService;
use App\Services\UserService;

class AccountController
{
    protected $userService;
    protected $badgeService;
    protected $itemService;

    protected $allBadges;
    protected $allItems;
    public function __construct(UserService $userService, BadgeService $badgeService, ItemService $itemService)
    {
        $this->userService = $userService;
        $this->badgeService = $badgeService;
        $this->itemService = $itemService;
        $this->allBadges = $this->badgeService->checkCacheBadge();
        $this->allItems = $this->itemService->checkCacheItems();

    }

    public function index(){
        $user = session()->get('user');
        $userInfo = $this->userService->getUserInfo($user['email']);
//        dd($userInfo);
        return view('account/index', [
            'allBadges' => $this->allBadges,
            'allItems' => $this->allItems,
            'user' => $userInfo,
        ]);
    }
}
