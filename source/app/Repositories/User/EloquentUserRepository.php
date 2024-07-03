<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Services\LogService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EloquentUserRepository implements UserRepositoryInterface
{
    protected $userModel;
    protected $logService;

    public function __construct(User $userModel, LogService $logService)
    {
        $this->userModel = $userModel;
        $this->logService = $logService;
    }

    public function login($data)
    {
        $user = false;
        if (filter_var($data['username'], FILTER_VALIDATE_EMAIL)) {
            $user = $this->userModel::where('email', $data['username'])->first();
        } else {
            $user = $this->userModel::where('user_name', $data['username'])->first();
        }
        if ($user && Hash::check($data['password'], $user->password)) {
            $userInfo = [
                'user_id' => $user->user_id,
                'name' => $user->name,
                'user_name' => $user->user_name,
                'email' => $user->email,
                'points' => $user->points,
                'money' => $user->money,
                'system_id' => $user->system_id,
                'level_id' => $user->level_id,
            ];
            $user->last_login = time();
            $user->save();
            return $userInfo;
        }

        return false;
    }

    public function findByEmail($email)
    {
        $user = false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = $this->userModel::where('email', $email)->first();
        }
        if ($user) {
            $userInfo = [
                'user_id' => $user->user_id,
                'name' => $user->name,
                'user_name' => $user->user_name,
                'email' => $user->email,
                'points' => $user->points,
                'money' => $user->money,
                'system_id' => $user->system_id,
                'level_id' => $user->level_id,
            ];
            return $userInfo;
        }
        return false;
    }


    public function getUserInfo($email){
        $user = false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = $this->userModel::where('email', $email)->first();
        }
        if ($user) {
            $userInfo = [
                'user_id' => $user->user_id,
                'name' => $user->name,
                'user_name' => $user->user_name,
                'email' => $user->email,
                'points' => $user->points,
                'money' => $user->money,
                'description' => $user->user_description,
                'system_id' => $user->system_id,
                'level_id' => $user->level_id,
                'item' => json_decode($user->user_item, true),
                'badge' => json_decode($user->user_badge, true),
            ];
            return $userInfo;
        }
        return false;
    }

    public function getUserInfoById($userId){
        $user = $this->userModel::where('user_id', $userId)->first();
        if ($user) {
            $userInfo = [
                'user_id' => $user->user_id,
                'name' => $user->name,
                'user_name' => $user->user_name,
                'email' => $user->email,
                'points' => $user->points,
                'money' => $user->money,
                'description' => $user->user_description,
                'system_id' => $user->system_id,
                'level_id' => $user->level_id,
                'item' => json_decode($user->user_item, true),
                'badge' => json_decode($user->user_badge, true),
            ];
            return $userInfo;
        }
        return false;
    }

    public function createUserLoginGoogle($data)
    {
        $checkUser = $this->findByEmail($data->email);
        if ($checkUser) {
            return $checkUser;
        } else {
            $dataCreate = [
                'name' => $data->name,
                'email' => $data->email,
                'user_name' => strtolower(explode('@', $data->email)[0]),
                'password' => Hash::make(Str::random(10)),
                'points' => 100,
                'money' => 1000,
                'system_id' => 1,
                'level_id' => 1,
                'created_at' => time(),
                'updated_at' => null,
                'last_login' => time()
            ];
            $createUser = $this->userModel::create($dataCreate);
            if($createUser){
                return [
                    'user_id' => $createUser->user_id,
                    'name' => $data->name,
                    'email' => $data->email,
                    'user_name' => strtolower(explode('@', $data->email)[0]),
                    'points' => 100,
                    'money' => 1000,
                    'system_id' => 1,
                    'level_id' => 1,
                ];
            }
        }
    }

    public function updateLastLogin($userId){
        return $this->userModel->where('user_id', $userId)->update([
            'last_login' => time()
        ]);
    }

    public function updateItem($userId, $itemId, $quantity, $action)
    {
        try {
            $user = session()->get('user');
            if ($userId != $user['user_id']) {
                return [
                    'success' => false,
                    'message' => 'Phiên đăng nhập thất bại'
                ];
            }

            $userInfo = $this->userModel->where('user_id', $userId)->first(['user_id', 'user_name', 'user_item']);
            if (!$userInfo) {
                return [
                    'success' => false,
                    'message' => 'Người dùng không tồn tại'
                ];
            }

            $itemUserOld = $itemUser = json_decode($userInfo->user_item, true);
            if ($itemUser == null) {
                $itemUser = [$itemId => $quantity];
            } else {
                if (isset($itemUser[$itemId])) {
                    if ($action == 'add') {
                        $itemUser[$itemId] += $quantity;
                    } elseif ($action == 'minus') {
                        $itemUser[$itemId] -= $quantity;
                        if ($itemUser[$itemId] < 0) {
                            return [
                                'success' => false,
                                'message' => 'Số lượng vật phẩm không hợp lệ'
                            ];
                        }
                    }
                } else {
                    if ($action == 'add') {
                        $itemUser[$itemId] = $quantity;
                    } elseif ($action == 'minus') {
                        return [
                            'success' => false,
                            'message' => 'Người dùng không có vật phẩm này'
                        ];
                    }
                }
            }

            $update = $this->userModel->where('user_id', $userId)->update([
                'user_item' => json_encode($itemUser)
            ]);

            if ($update) {
                $this->logService->log($userId, 'update_item', [
                    'old_item' => $itemUserOld,
                    'new_item' => $itemUser,
                    'item_change' => [
                        'item_id' => $itemId,
                        'item_quantity' => $quantity
                    ]
                ], 'Thành công');

                return [
                    'success' => true,
                    'message' => 'Cập nhật vật phẩm thành công'
                ];
            }

            return [
                'success' => false,
                'message' => 'Cập nhật vật phẩm không thành công'
            ];
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function updatePoint($userId, $point, $action)
    {
        try {
            $user = session()->get('user');
            if ($userId != $user['user_id']) {
                return [
                    'success' => false,
                    'message' => 'Phiên đăng nhập thất bại'
                ];
            }

            $userInfo = $this->userModel->where('user_id', $userId)->first(['user_id', 'user_name', 'points']);
            if (!$userInfo) {
                return [
                    'success' => false,
                    'message' => 'Người dùng không tồn tại'
                ];
            }

            if ($point <= 0) {
                return [
                    'success' => false,
                    'message' => 'Số tu vi không hợp lệ'
                ];
            }

            $pointOld = $userInfo->points;

            if ($action === 'add') {
                $pointNew = $pointOld + $point;
            } else if ($action === 'minus') {
                $pointNew = $pointOld - $point;
                if ($pointNew < 0) {
                    return [
                        'success' => false,
                        'message' => 'Số tu vi không thể nhỏ hơn 0'
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Hành động không hợp lệ'
                ];
            }

            $update = $this->userModel->where('user_id', $userId)->update(['points' => $pointNew]);

            if (!$update) {
                return [
                    'success' => false,
                    'message' => 'Cập nhật tu vi không thành công'
                ];
            }

            $logMessage = $action == 'add' ? "Nhận thêm {$point} tu vi" : "Mất đi {$point} tu vi";
            $this->logService->log($userId, 'update_point', ['pointOld' => $pointOld, 'pointNew' => $pointNew], $logMessage, $point);

            return [
                'success' => true,
                'message' => 'Cập nhật tu vi thành công'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateMoney($userId, $money, $action)
    {
        try {
            $user = session()->get('user');
            if ($userId != $user['user_id']) {
                return [
                    'success' => false,
                    'message' => 'Phiên đăng nhập thất bại'
                ];
            }

            $userInfo = $this->userModel->where('user_id', $userId)->first(['user_id', 'user_name', 'money']);
            if (!$userInfo) {
                return [
                    'success' => false,
                    'message' => 'Người dùng không tồn tại'
                ];
            }
            if ($money == 0) {
                return [
                    'success' => false,
                    'message' => 'Số tiên nguyên thạch không hợp lệ'
                ];
            }
            $moneyOld = $userInfo->money;

            if ($action === 'add') {
                $moneyNew = $moneyOld + $money;
            } elseif ($action === 'minus') {
                $moneyNew = $moneyOld - $money;
                if ($moneyNew < 0) {
                    return [
                        'success' => false,
                        'message' => 'Số tiên nguyên thạch không thể nhỏ hơn 0'
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Hành động không hợp lệ'
                ];
            }

            $update = $this->userModel->where('user_id', $userId)->update([
                'money' => $moneyNew
            ]);

            if (!$update) {
                return [
                    'success' => false,
                    'message' => 'Cập nhật tiên nguyên thạch không thành công'
                ];
            }

            $logMessage = $action == 'add' ? "Nhận thêm {$money} tiên nguyên thạch" : "Mất đi {$money} tiên nguyên thạch";
            $this->logService->log($userId, 'update_money', ['moneyOld' => $moneyOld, 'moneyNew' => $moneyNew], $logMessage, $money);

            return [
                'success' => true,
                'message' => 'Cập nhật tiên nguyên thạch thành công'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateBadge($userId, $badgeId, $action)
    {
        try {
            $user = session()->get('user');
            if ($userId != $user['user_id']) {
                return [
                    'success' => false,
                    'message' => 'Phiên đăng nhập thất bại'
                ];
            }

            $userInfo = $this->userModel->where('user_id', $userId)->first(['user_id', 'user_name', 'user_badge']);
            if (!$userInfo) {
                return [
                    'success' => false,
                    'message' => 'Người dùng không tồn tại'
                ];
            }

            $badgesOld = $badges = json_decode($userInfo->user_badge, true);
            if ($badges == null) {
                $badges = [];
            }

            if ($action === 'add') {
                if (!in_array($badgeId, $badges)) {
                    $badges[] = $badgeId;
                } else {
                    return [
                        'success' => false,
                        'message' => 'Người dùng đã có huy hiệu này'
                    ];
                }
            } elseif ($action === 'remove') {
                if (in_array($badgeId, $badges)) {
                    $badges = array_filter($badges, function ($id) use ($badgeId) {
                        return $id != $badgeId;
                    });
                } else {
                    return [
                        'success' => false,
                        'message' => 'Người dùng không có huy hiệu này để xóa'
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Hành động không hợp lệ'
                ];
            }

            // Cập nhật badges của người dùng
            $update = $this->userModel->where('user_id', $userId)->update([
                'user_badge' => json_encode(array_values($badges))
            ]);

            if (!$update) {
                return [
                    'success' => false,
                    'message' => 'Cập nhật huy hiệu không thành công'
                ];
            }

            $logMessage = $action == 'add' ? "Mua huy hiệu có ID là: {$badgeId}" : "Bán huy hiệu có ID là: {$badgeId}";
            $this->logService->log($userId, 'update_badge', ['badgesOld' => $badgesOld, 'badgesNew' => $badges], $logMessage, $badgeId);

            return [
                'success' => true,
                'message' => 'Cập nhật huy hiệu thành công'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
