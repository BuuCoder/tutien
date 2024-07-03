<?php

namespace App\Repositories\Item;

use App\Models\Item;
use App\Services\LogService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EloquentItemRepository implements ItemRepositoryInterface
{
    protected $itemModel;
    protected $userService;
    protected $logService;

    public function __construct(UserService $userService, Item $itemModel, LogService $logService)
    {
        $this->itemModel = $itemModel;
        $this->userService = $userService;
        $this->logService = $logService;
    }

    public function getAllItems()
    {
        return $this->itemModel->all();
    }

    public function buy($userId, $itemId)
    {
        try {
            DB::beginTransaction();

            $item = Item::find($itemId);
            if (!$item) {
                return ['success' => false, 'message' => 'Vật phẩm không tồn tại'];
            }

            $user = $this->userService->getUserInfoById($userId);
            $userMoney = $user['money'];

            if ($userMoney < $item->item_price) {
                return ['success' => false, 'message' => 'Không đủ tiên nguyên thạch để trao đổi'];
            }

            $quantity = 1;
            $name = $item->item_name;
            $money = $item->item_price;

            $updateItem = $this->userService->updateItem($userId, $itemId, $quantity, 'add');
            if (!$updateItem['success']) {
                throw new \Exception('Mua vật phẩm không thành công (row: 52) ID User:'. $userId);
            }

            $updateMoney = $this->userService->updateMoney($userId, $money, 'minus');
            if (!$updateMoney['success']) {
                throw new \Exception('Mua vật phẩm không thành công (row: 57) ID User:'. $userId);
            }

            $this->logService->log($userId, 'buy_item', ['user_id' => $userId, 'item' => $itemId], "Mua vật phẩm thành công nhận được {$quantity} {$name}", 0);

            DB::commit();

            return ['success' => true, 'message' => "Mua {$name} thành công nhận được {$quantity} {$name}"];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Lỗi khi mua vật phẩm : " . $e->getMessage());
            return ['success' => false, 'message' => 'Mua vật phẩm không thành công'];
        }
    }

    public function sell($userId, $itemId)
    {
        try {
            DB::beginTransaction();

            $item = Item::find($itemId);
            if (!$item) {
                return ['success' => false, 'message' => 'Vật phẩm không tồn tại'];
            }

            $user = $this->userService->getUserInfoById($userId);
            $userItems = $user['item'];

            if (!isset($userItems[$itemId]) || $userItems[$itemId] <= 0) {
                return ['success' => false, 'message' => 'Người dùng không có vật phẩm này để bán'];
            }

            $quantity = 1;
            $name = $item->item_name;
            $money = $item->item_price * 0.8;

            $updateItem = $this->userService->updateItem($userId, $itemId, $quantity, 'minus');
            if (!$updateItem['success']) {
                throw new \Exception('Bán vật phẩm không thành công (row: 95) ID User:'. $userId);
            }

            $updateMoney = $this->userService->updateMoney($userId, $money, 'add');
            if (!$updateMoney['success']) {
                throw new \Exception('Bán vật phẩm không thành công (row: 100) ID User:'. $userId);
            }

            $this->logService->log($userId, 'sell_item', ['user_id' => $userId, 'item' => $itemId], "Bán vật phẩm thành công", 0);

            DB::commit();

            return ['success' => true, 'message' => "Bán {$name} thành công"];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Bán vật phẩm không thành công: " . $e->getMessage());
            return ['success' => false, 'message' => 'Bán vật phẩm không thành công'];
        }
    }
}
