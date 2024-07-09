<?php

namespace App\Repositories\CraftPotion;

use App\Models\AlchemyFurnace;
use App\Models\Potion;
use App\Models\UserPotion;
use App\Services\LogService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EloquentCraftPotionRepository implements CraftPotionRepositoryInterface
{
    protected $userPotionModel;
    protected $potionModel;
    protected $alchemyFurnaceModel;
    protected $logService;
    protected $userService;

    public function __construct(
        UserPotion $userPotionModel,
        Potion $potionModel,
        AlchemyFurnace $alchemyFurnaceModel,
        LogService $logService,
        UserService $userService
    )
    {
        $this->userPotionModel = $userPotionModel;
        $this->potionModel = $potionModel;
        $this->alchemyFurnaceModel = $alchemyFurnaceModel;
        $this->logService = $logService;
        $this->userService = $userService;
    }

    public function getUserPotions($userId)
    {
        return $this->userPotionModel->where('user_id', $userId)->with('potion')->get();
    }

    public function craftPotion($userId, $potionId, $furnaceId)
    {
        try {
            $checkPotion = $this->userPotionModel->where([
                'user_id' => $userId,
                'furnace_id' => $furnaceId
            ])->first();

            if ($checkPotion) {
                return [
                    'success' => false,
                    'message' => 'Lô đỉnh đang có đan dược! Không thể luyện thêm'
                ];
            }

            // Tìm đan dược và lò luyện đan
            $potion = $this->potionModel->find($potionId);
            $furnace = $this->alchemyFurnaceModel->find($furnaceId);

            if (!$potion || !$furnace) {
                return [
                    'success' => false,
                    'message' => 'Luyện đan không hợp lệ!'
                ];
            }

            // Tính toán thời gian luyện đan
            $craftingTime = $potion->crafting_time * (1 - $furnace->time_reduction_percentage / 100);

            $data = [
                'user_id' => $userId,
                'potion_id' => $potionId,
                'furnace_id' => $furnaceId,
                'created_at' => time(),
                'crafting_time' => $craftingTime,
            ];

            // Bắt đầu giao dịch
            DB::beginTransaction();

            // Thêm dữ liệu vào bảng user_potion
            $update = $this->userPotionModel->create($data);

            if ($update) {
                // Commit giao dịch nếu thành công
                DB::commit();
                $this->logService->log($userId, 'craft_potion', ['user_id' => $userId, 'potion_id' => $potionId, 'furnace_id' => $furnaceId], "Bắt đầu luyện đan");
                return [
                    'success' => true,
                    'message' => 'Bắt đầu luyện chế đan dược!'
                ];
            } else {
                // Rollback giao dịch nếu thất bại
                DB::rollBack();
                return [
                    'success' => false,
                    'message' => 'Luyện đan không thành công!'
                ];
            }
        } catch (\Exception $e) {
            // Rollback giao dịch nếu xảy ra ngoại lệ
            DB::rollBack();
            Log::error('Lỗi khi luyện đan (row: 88): ' . $e->getMessage(), [
                'user_id' => $userId,
                'potion_id' => $potionId,
                'furnace_id' => $furnaceId,
                'exception' => $e
            ]);

            return [
                'success' => false,
                'message' => 'Luyện đan không thành công!'
            ];
        }
    }

    public function collectPotion($userId, $furnaceId)
    {
        try {
            DB::beginTransaction();

            $userPotion = $this->userPotionModel->where([
                'user_id' => $userId,
                'furnace_id' => $furnaceId
            ])->first();

            if (!$userPotion) {
                return ['success' => false, 'message' => 'Chưa thực hiện luyện chế đan dược'];
            }

            $craftingEndTime = $userPotion->created_at + $userPotion->crafting_time * 3600;
            $currentTime = time();

            if ($currentTime < $craftingEndTime) {
                return ['success' => false, 'message' => 'Đan dược chưa luyện chế xong'];
            }

            $potionId = $userPotion->potion_id;
            $quantity = 1; // Số lượng đan dược nhận được
            $potion = Potion::find($potionId);

            if (!$potion) {
                return ['success' => false, 'message' => 'Đan dược không tồn tại'];
            }

            // Cập nhật số lượng đan dược của người dùng
            $updatePotion = $this->userService->updatePotion($userId, $potionId, $quantity, 'add');
            if (!$updatePotion['success']) {
                throw new \Exception('Nhận đan dược không thành công (row: 45) ID User:'. $userId);
            }

            // Xóa đan dược khỏi lò đỉnh
            $this->userPotionModel->where([
                'user_id' => $userId,
                'furnace_id' => $furnaceId
            ])->delete();

            $this->logService->log($userId, 'collect_potion', ['user_id' => $userId, 'potion_id' => $potionId], "Nhận {$potion->name} thành công", 0);

            DB::commit();

            return ['success' => true, 'message' => "Nhận {$potion->name} thành công"];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Nhận đan dược không thành công (row:156): " . $e->getMessage());
            return ['success' => false, 'message' => 'Nhận đan dược không thành công'];
        }
    }

}
