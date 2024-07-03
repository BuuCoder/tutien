<?php

namespace App\Repositories\Badge;

use App\Models\Badge;
use App\Services\LogService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EloquentBadgeRepository implements BadgeRepositoryInterface
{
    protected $userService;
    protected $badgeModel;
    protected $logService;

    public function __construct(UserService $userService, Badge $badgeModel, LogService $logService)
    {
        $this->userService = $userService;
        $this->badgeModel = $badgeModel;
        $this->logService = $logService;
    }

    public function getAllBadge()
    {
        try {
            $allBadge = $this->badgeModel->where('badge_buy', 'Y')->get();
            if ($allBadge) {
                return $allBadge;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function buy($userId, $badgeId)
    {
        try {
            DB::beginTransaction();

            // Kiểm tra tồn tại của huy hiệu
            $badge = $this->badgeModel->find($badgeId);
            if (!$badge || $badge->badge_buy !== 'Y') {
                return [
                    'success' => false,
                    'message' => 'Huy hiệu không tồn tại hoặc không được phép mua'
                ];
            }

            // Kiểm tra người dùng có đủ tiên nguyên thạch để mua huy hiệu hay không
            $user = $this->userService->getUserInfoById($userId);
            if ($user['money'] < $badge->badge_price) {
                return [
                    'success' => false,
                    'message' => 'Bạn không đủ tiên nguyên thạch để mua huy hiệu này'
                ];
            }

            // Kiểm tra người dùng đã sở hữu huy hiệu này chưa
            $userBadges = $user['badge'];
            if (in_array($badgeId, $userBadges)) {
                return [
                    'success' => false,
                    'message' => 'Bạn đã sở hữu huy hiệu này'
                ];
            }

            // Trừ tiên nguyên thạch người dùng
            $updateMoney = $this->userService->updateMoney($userId, $badge->badge_price, 'minus');
            if (!$updateMoney['success']) {
                throw new \Exception('Cập nhật tiên nguyên thạch không thành công (row: 71)');
            }

            // Cập nhật huy hiệu cho người dùng
            $updateBadge = $this->userService->updateBadge($userId, $badgeId, 'add');
            if (!$updateBadge['success']) {
                throw new \Exception('Cập nhật huy hiệu không thành công (row: 77)');
            }

            // Cộng tu vi cho người dùng
            $updatePoint = $this->userService->updatePoint($userId, $badge->badge_price, 'add');
            if (!$updatePoint['success']) {
                throw new \Exception('Cập nhật tu vi không thành công (row: 83)');
            }

            // Ghi log mua huy hiệu
            $this->logService->log($userId, 'buy_badge', ['badge_id' => $badgeId], "Mua huy hiệu {$badge->badge_name} thành công");

            DB::commit();

            return [
                'success' => true,
                'message' => 'Mua huy hiệu thành công'
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi khi mua vật phẩm: ' . $e->getMessage(), [
                'user_id' => $userId,
                'badge_id' => $badgeId,
                'exception' => $e
            ]);

            return [
                'success' => false,
                'message' => 'Có lỗi xảy ra trong quá trình mua huy hiệu. Vui lòng thử lại sau.'
            ];
        }
    }

    public function sell($userId, $badgeId)
    {
        try {
            DB::beginTransaction();

            // Kiểm tra tồn tại của huy hiệu
            $badge = $this->badgeModel->find($badgeId);
            if (!$badge || $badge->badge_buy !== 'Y') {
                return [
                    'success' => false,
                    'message' => 'Huy hiệu không tồn tại hoặc không được phép bán'
                ];
            }

            // Kiểm tra người dùng có huy hiệu này hay không
            $user = $this->userService->getUserInfoById($userId);
            $userBadges = $user['badge'];
            if (!in_array($badgeId, $userBadges)) {
                return [
                    'success' => false,
                    'message' => 'Bạn không sở hữu huy hiệu này'
                ];
            }

            // Tính toán số tiên nguyên thạch hoàn lại (80% giá trị)
            $refundAmount = $badge->badge_price * 0.8;

            // Trừ tu vi đã nhận khi mua huy hiệu
            $updatePoint = $this->userService->updatePoint($userId, $badge->badge_price, 'minus');
            if (!$updatePoint['success']) {
                throw new \Exception('Cập nhật tu vi không thành công (row: 140)');
            }

            // Cộng tiên nguyên thạch cho người dùng
            $updateMoney = $this->userService->updateMoney($userId, $refundAmount, 'add');
            if (!$updateMoney['success']) {
                throw new \Exception('Cập nhật tiên nguyên thạch không thành công (row: 146)');
            }

            // Cập nhật huy hiệu cho người dùng
            $updateBadge = $this->userService->updateBadge($userId, $badgeId, 'remove');
            if (!$updateBadge['success']) {
                throw new \Exception('Cập nhật huy hiệu không thành công (row: 152)');
            }

            // Ghi log bán huy hiệu
            $this->logService->log($userId, 'sell_badge', ['badge_id' => $badgeId], "Bán huy hiệu {$badge->badge_name} thành công");

            DB::commit();

            return [
                'success' => true,
                'message' => 'Bán huy hiệu thành công'
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi khi bán vật phẩm : ' . $e->getMessage(), [
                'user_id' => $userId,
                'badge_id' => $badgeId,
                'exception' => $e
            ]);

            return [
                'success' => false,
                'message' => 'Có lỗi xảy ra trong quá trình bán huy hiệu. Vui lòng thử lại sau.'
            ];
        }
    }
}
