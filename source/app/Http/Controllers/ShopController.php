<?php

namespace App\Http\Controllers;

use App\Services\BadgeService;
use App\Services\ItemService;
use App\Services\UserService;
use Illuminate\Http\Request;

class ShopController
{
    protected $badgeService;
    protected $itemService;
    protected $userService;
    protected $allBadge;
    protected $allItems;

    public function __construct(UserService $userService, ItemService $itemService, BadgeService $badgeService)
    {
        $this->itemService = $itemService;
        $this->badgeService = $badgeService;
        $this->userService = $userService;
        $this->allBadge = $this->badgeService->checkCacheBadge();
        $this->allItems = $this->itemService->checkCacheItems();
    }

    public function index()
    {
        $user = session()->get('user');
        $userInfo = $this->userService->getUserInfo($user['email']);
        $allBadges = $this->allBadge;
        $allItems = $this->allItems;
        return view('shop.index',[
            'allBadges' => $allBadges,
            'allItems' => $allItems,
            'userItems' => $userInfo['item'],
            'userBadges' => $userInfo['badge'],
        ]);
    }

    public function buyBadge(Request $request)
    {
        $badgeId = $request->input('badgeId');
        $user = session()->get('user');
        $isApi = $request->expectsJson();

        try {
            $result = $this->badgeService->buyBadge($user['user_id'], $badgeId);

            return $result['success']
                ? responseSuccess([], $result['message'], 200, $isApi)
                : responseError($result['message'], 500, [], $isApi);
        } catch (\Exception $e) {
            return responseError('Có lỗi xảy ra trong quá trình mua huy hiệu. Vui lòng thử lại sau.', 500, [], $isApi);
        }
    }

    public function sellBadge(Request $request)
    {
        $badgeId = $request->input('badgeId');
        $user = session()->get('user');
        $isApi = $request->expectsJson();

        try {
            $result = $this->badgeService->sellBadge($user['user_id'], $badgeId);

            return $result['success']
                ? responseSuccess([], $result['message'], 200, $isApi)
                : responseError($result['message'], 500, [], $isApi);
        } catch (\Exception $e) {
            return responseError('Có lỗi xảy ra trong quá trình bán huy hiệu. Vui lòng thử lại sau.', 500, [], $isApi);
        }
    }

    public function buyItem(Request $request)
    {
        $itemId = $request->input('itemId');
        $user = session()->get('user');
        $isApi = $request->expectsJson();

        try {
            $result = $this->itemService->buyItem($user['user_id'], $itemId);

            return $result['success']
                ? responseSuccess([], $result['message'], 200, $isApi)
                : responseError($result['message'], 500, [], $isApi);
        } catch (\Exception $e) {
            return responseError('Có lỗi xảy ra trong quá trình mua vật phẩm. Vui lòng thử lại sau.', 500, [], $isApi);
        }
    }

    public function sellItem(Request $request)
    {
        $itemId = $request->input('itemId');
        $user = session()->get('user');
        $isApi = $request->expectsJson();

        try {
            $result = $this->itemService->sellItem($user['user_id'], $itemId);

            return $result['success']
                ? responseSuccess([], $result['message'], 200, $isApi)
                : responseError($result['message'], 500, [], $isApi);
        } catch (\Exception $e) {
            return responseError('Có lỗi xảy ra trong quá trình bán vật phẩm. Vui lòng thử lại sau.', 500, [], $isApi);
        }
    }
}
