<?php

namespace App\Repositories\CraftPotion;

use App\Models\AlchemyFurnace;
use App\Models\Potion;
use App\Models\UserPotion;
use App\Services\LogService;
use Illuminate\Support\Facades\DB;

class EloquentCraftPotionRepository implements CraftPotionRepositoryInterface
{
    protected $userPotionModel;
    protected $potionModel;
    protected $alchemyFurnaceModel;
    protected $logService;

    public function __construct(UserPotion $userPotionModel, Potion $potionModel, AlchemyFurnace $alchemyFurnaceModel, LogService $logService)
    {
        $this->userPotionModel = $userPotionModel;
        $this->potionModel = $potionModel;
        $this->alchemyFurnaceModel = $alchemyFurnaceModel;
        $this->logService = $logService;
    }

    public function getUserPotions($userId)
    {
        return $this->userPotionModel->where('user_id', $userId)->with('potion')->get();
    }

    public function craft($userId, $potionId, $furnaceId)
    {
        try {
            $checkPotion = $this->userPotionModel->where([
                'user_id' => $userId,
                'furnace_id' => $furnaceId
            ])->first();

            if ($checkPotion) {
                $craftingEndTime = $checkPotion->created_at->timestamp + $checkPotion->crafting_time * 3600;
                if (time() < $craftingEndTime) {
                    return [
                        'success' => false,
                        'message' => 'Lò đang có đan dược đang phát triển'
                    ];
                }
            }

            $potion = $this->potionModel->find($potionId);
            $furnace = $this->alchemyFurnaceModel->find($furnaceId);

            if (!$potion || !$furnace) {
                return [
                    'success' => false,
                    'message' => 'Invalid potion or furnace'
                ];
            }

            $craftingTime = $potion->crafting_time * (1 - $furnace->time_reduction_percentage / 100);

            $data = [
                'user_id' => $userId,
                'potion_id' => $potionId,
                'furnace_id' => $furnaceId,
                'created_at' => now(),
                'crafting_time' => $craftingTime,
            ];

            DB::beginTransaction();
            $update = $this->userPotionModel->create($data);
            if ($update) {
                DB::commit();
                $this->logService->log($userId, 'craft_potion', ['user_id' => $userId, 'potion_id' => $potionId, 'furnace_id' => $furnaceId], "Gieo hạt thành công");
                return [
                    'success' => true,
                    'message' => 'Bắt đầu luyện đan dược thành công!'
                ];
            } else {
                DB::rollBack();
                return [
                    'success' => false,
                    'message' => 'Bắt đầu luyện đan dược thất bại'
                ];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
