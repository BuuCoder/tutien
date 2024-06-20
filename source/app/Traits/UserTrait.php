<?php

namespace App\Traits;

use App\Models\User;

trait UserTrait
{
    public function updateItemQuantity($itemId, $quantity)
    {
        $user = session()->get('user');
        $userModel = new User();
        $userInfo = $userModel->where('user_id', $user['user_id'])->first(['user_id', 'user_name', 'user_item']);
        if (!$userInfo) {
            return [
                'success' => false,
                'message' => 'Người dùng không tồn tại'
            ];
        }

        $itemUser = json_decode($userInfo->user_item, true); // Chuyển đổi thành mảng
        if ($itemUser == null) {
            $dataItemRecieve[$itemId] = $quantity;
            $itemUser = $dataItemRecieve;
        } else {
            if (isset($itemUser[$itemId])) {
                $itemUser[$itemId] += $quantity;
            } else {
                $itemUser[$itemId] = $quantity;
            }
        }

        $update = $userModel->where('user_id', $user['user_id'])->update([
            'user_item' => json_encode($itemUser)
        ]);

        if ($update) {
            return [
                'success' => true,
                'message' => 'Cập nhật item thành công'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Cập nhật item không thành công'
            ];
        }
    }
}
