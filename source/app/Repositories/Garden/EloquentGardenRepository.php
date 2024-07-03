<?php

namespace App\Repositories\Garden;

use App\Models\Garden;
use App\Models\Item;
use App\Models\Pot;
use App\Services\LogService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            $this->fisherYatesShuffle($getListTree);
            $idTree = $getListTree[0]['id'];
            $nameTree = $getListTree[0]['item_name'];
            $quantityTree = 1;
            $point = 10;

            // Cập nhật vật phẩm cho người dùng
            $receiveItem = $this->userService->updateItem($userId, $idTree, $quantityTree, 'add');
            if (!$receiveItem['success']) {
                throw new \Exception('Thu hoạch không thành công (row: 152): không thể cập nhật vật phẩm');
            }

            // Cập nhật điểm cho người dùng
            $receivePoint = $this->userService->updatePoint($userId, $point, 'add');
            if (!$receivePoint['success']) {
                throw new \Exception('Thu hoạch không thành công (row: 158): không thể cập nhật điểm');
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
                throw new \Exception('Thu hoạch không thành công (row: 171) : không thể cập nhật trạng thái chậu');
            }

            // Ghi log thu hoạch
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
            Log::error('Lỗi khi thu hoạch: ' . $e->getMessage(), [
                'user_id' => $userId,
                'pot_id' => $potId,
                'exception' => $e
            ]);

            return [
                'success' => false,
                'message' => 'Có lỗi xảy ra trong quá trình thu hoạch. Vui lòng thử lại sau.'
            ];
        }
    }

    function fisherYatesShuffle(&$array) {
        $n = count($array);
        for ($i = $n - 1; $i > 0; $i--) {
            $j = mt_rand(0, $i);
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
        }
    }
}
