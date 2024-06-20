<?php

namespace App\Repositories\Garden;

use App\Models\Garden;
use App\Models\Item;
use App\Models\Pot;
use App\Traits\UserTrait;

class EloquentGardenRepository implements GardenRepositoryInterface
{
    use UserTrait;

    protected $gardenModel;
    protected $potModel;
    protected $itemModel;

    public function __construct(Garden $gardenModel, Pot $potModel, Item $itemModel)
    {
        $this->gardenModel = $gardenModel;
        $this->potModel = $potModel;
        $this->itemModel = $itemModel;
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
            $potInfo = $this->potModel->where('pot_id', $potId)->first();

            if ((time() - $checkPot->pot_time_start) >= $potInfo->pot_growth * 3600) {
                $getListTree = $this->itemModel->where('item_type', 'Tree')->get(['id','item_name'])->toArray();
                shuffle($getListTree);
                $idTree = $getListTree[0]['id'];
                $nameTree = $getListTree[0]['item_name'];
                $quantityTree = rand(2, 5);

                $receive = $this->updateItemQuantity($idTree, $quantityTree);
                if ($receive['success']) {
                    $update = $this->gardenModel->where([
                        'user_id' => $userId,
                        'pot_id' => $potId
                    ])->update([
                        'pot_time_start' => 0,
                        'updated_at' => time(),
                    ]);
                    return [
                        'success' => true,
                        'data' => [],
                        'message' => "Thu hoạch thành công nhận được {$quantityTree} cây {$nameTree}"
                    ];
                }
                return [
                    'success' => false,
                    'message' => 'Chậu đang có linh dược đang phát triển'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Chậu đang có linh dược đang phát triển'
                ];
            }
        }else{
            return [
                'success' => false,
                'message' => 'Bạn chưa gieo hạt cho chậu linh dược này!'
            ];
        }
    }
}
