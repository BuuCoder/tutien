<?php

namespace App\Http\Controllers;

use App\Services\BadgeService;
use App\Services\ItemService;
use App\Services\RankService;
use App\Services\SystemService;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class AccountController
{
    protected $userService;
    protected $badgeService;
    protected $itemService;
    protected $rankService;
    protected $systemService;

    protected $allBadges;
    protected $allItems;
    protected $allRanks;
    protected $allSystems;

    public function __construct(
        UserService   $userService,
        BadgeService  $badgeService,
        ItemService   $itemService,
        RankService   $rankService,
        SystemService $systemService
    )
    {
        $this->userService = $userService;
        $this->badgeService = $badgeService;
        $this->itemService = $itemService;
        $this->rankService = $rankService;
        $this->systemService = $systemService;
        try {
            $this->allBadges = $this->badgeService->checkCacheBadge();
            $this->allItems = $this->itemService->checkCacheItems();
            $this->allSystems = $this->systemService->checkCacheSystems();
            $this->allRanks = $this->rankService->checkCacheRanks();
        } catch (\Exception $e) {
            Log::error('Lấy dữ liệu từ cache có lỗi trong AccountController: ' . $e->getMessage());
            Redirect::route('welcome')->with('error', 'Tài khoản hiện không khả dụng vui lòng liên hệ với Admin')->send();
            abort(302);
        }
    }

    public function index()
    {
        try {
            $user = session()->get('user');
            $userInfo = $this->userService->getUserInfo($user['email']);

            $checkValidRank = $this->isValidRankForUser($userInfo['level_id'], $userInfo['system_id']);
            if (!$checkValidRank) {
                Log::error('Xem tài khoản thất bại lỗi không xác thực được rank người dùng có ID : ' . $userInfo['user_id']);
                return redirect()->route('welcome')->with('error', 'Tài khoản hiện không khả dụng vui lòng liên hệ với Admin');
            }

            return view('account/index', [
                'allBadges' => $this->allBadges,
                'allItems' => $this->allItems,
                'allSystems' => $this->allSystems,
                'allRanks' => $this->allRanks,
                'user' => $userInfo,
            ]);
        } catch (\Exception $e) {
            Log::error('Xem tài khoản thất bại lỗi:' . $e->getMessage());
            return redirect()->route('welcome')->with('error', 'Tài khoản hiện không khả dụng vui lòng liên hệ với Admin');
        }
    }

    public function isValidRankForUser($levelId, $userSystemId)
    {
        if (isset($this->allRanks[$levelId])) {
            $rank = $this->allRanks[$levelId];
            return $rank['system_id'] === $userSystemId;
        }

        return false;
    }
}
