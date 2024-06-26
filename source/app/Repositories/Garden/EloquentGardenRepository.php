<?php

namespace App\Repositories\Garden;

use App\Models\Garden;
use App\Models\Item;
use App\Models\Pot;
use App\Services\LogService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;

class EloquentGardenRepository implements GardenRepositoryInterface
{
    protected $gardenModel;
    protected $potModel;
    protected $itemModel;
    protected $logService;
    protected $userService;

    public function __construct(Garden $gardenModel, Pot $potModel, Item $itemModel, LogService $logService, UserService $userService)
    {
        $this->gardenModel = $gardenModel;
        $this->potModel = $potModel;
        $this->itemModel = $itemModel;
        $this->logService = $logService;
        $this->userService = $userService;
    }

    public function getAllPot()
    {
        return $this->potModel->all();
    }

    public function checkPot($userId)
    {
        try {
            $checkPot = $this->gardenModel->where('user_id', $userId)->get();
            if (count($checkPot) == 0) {
                $createPot = $this->createPot($userId, [1, 2, 3]);
            }
            return $this->gardenModel->where('user_id', $userId)->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createPot($userId, $listPotId = [])
    {
        try {
            $data = [];
            foreach ($listPotId as $potId) {
                $data[] = ['user_id' => $userId, 'pot_id' => $potId, 'created_at' => time(), 'updated_at' => time()];
            }

            return $this->gardenModel->insert($data);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function grow($userId, $potId)
    {
        try {
            $checkPot = $this->gardenModel->where([
                'user_id' => $userId,
                'pot_id' => $potId
            ])->first();
            if (!$checkPot) {
                return [
                    'success' => false,
                    'message' => 'Chậu linh dược không tồn tại'
                ];
            }

            if ($checkPot->pot_time_start != 0) {
                return [
                    'success' => false,
                    'message' => 'Chậu đang có linh dược đang phát triển'
                ];
            }

            $update = $this->gardenModel->where([
                'user_id' => $userId,
                'pot_id' => $potId
            ])->update([
                'pot_time_start' => time(),
                'updated_at' => time()
            ]);
            if ($update) {
                $this->logService->log($userId, 'garden_grow', ['user_id' => $userId, 'pot_id' => $potId], "Gieo hạt thành công");
                return [
                    'success' => true,
                    'message' => 'Gieo hạt thành công'
                ];
            }
            return [
                'success' => false,
                'message' => 'Gieo hạt thất bại'
            ];
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function harvest($userId, $potId)
    {
        try {
            DB::beginTransaction();

            // Kiểm tra tồn tại của chậu linh dược
            $checkPot = $this->gardenModel->where([
                'user_id' => $userId,
                'pot_id' => $potId
            ])->first();

            if (!$checkPot) {
                return [
                    'success' => false,
                    'message' => 'Chậu linh dược không tồn tại'
                ];
            }

            if ($checkPot->pot_time_start == 0) {
                return [
                    'success' => false,
                    'message' => 'Bạn chưa gieo hạt cho chậu linh dược này!'
                ];
            }

            // Kiểm tra thời gian phát triển của chậu
            $potInfo = $this->potModel->where('pot_id', $potId)->first();

            if ((time() - $checkPot->pot_time_start) < $potInfo->pot_growth * 3600) {
                return [
                    'success' => false,
                    'message' => 'Chậu đang có linh dược đang phát triển'
                ];
            }

            // Lấy danh sách cây
            $getListTree = $this->itemModel->where('item_type', 'Tree')->get(['id', 'item_name'])->toArray();
            shuffle($getListTree);
            $idTree = $getListTree[0]['id'];
            $nameTree = $getListTree[0]['item_name'];
            $quantityTree = 1;
            $point = 10;

            // Cập nhật vật phẩm cho người dùng
            $receive = $this->userService->updateItem($userId, $idTree, $quantityTree, $point);
            if (!$receive['success']) {
                return [
                    'success' => false,
                    'message' => 'Thu hoạch không thành công'
                ];
            }

            // Cập nhật trạng thái chậu
            $update = $this->gardenModel->where([
                'user_id' => $userId,
                'pot_id' => $potId
            ])->update([
                'pot_time_start' => 0,
                'updated_at' => time(),
            ]);

            if (!$update) {
                return [
                    'success' => false,
                    'message' => 'Thu hoạch không thành công'
                ];
            }

            // Ghi log thu hoạch
            $point = 10;
            $this->logService->log($userId, 'garden_harvest', ['user_id' => $userId, 'pot_id' => $potId], "Thu hoạch thành công nhận được {$quantityTree} {$nameTree}", $point);
            // Commit transaction
            DB::commit();

            return [
                'success' => true,
                'data' => [],
                'message' => "Thu hoạch thành công nhận được {$quantityTree} cây {$nameTree}"
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
