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

    public function updateItem($userId, $itemId, $quantity, $point)
    {
        try {
            // Lấy thông tin người dùng từ session
            $user = session()->get('user');
            if ($userId != $user['user_id']) {
                return [
                    'success' => false,
                    'message' => 'Phiên đăng nhập thất bại'
                ];
            }

            // Lấy thông tin người dùng từ database
            $userInfo = $this->userModel->where('user_id', $user['user_id'])->first(['user_id', 'user_name', 'user_item']);
            if (!$userInfo) {
                return [
                    'success' => false,
                    'message' => 'Người dùng không tồn tại'
                ];
            }

            // Cập nhật vật phẩm của người dùng
            $itemUserOld = $itemUser = json_decode($userInfo->user_item, true);
            if ($itemUser == null) {
                $itemUser = [$itemId => $quantity];
            } else {
                if (isset($itemUser[$itemId])) {
                    $itemUser[$itemId] += $quantity;
                } else {
                    $itemUser[$itemId] = $quantity;
                }
            }

            // Cập nhật lại thông tin vật phẩm của người dùng trong database
            $update = $this->userModel->where('user_id', $user['user_id'])->update([
                'user_item' => json_encode($itemUser)
            ]);

            if ($update) {
                // Ghi log thay đổi vật phẩm
                $this->logService->log($user['user_id'], 'update_item', [
                    'old_item' => $itemUserOld,
                    'new_item' => $itemUser,
                    'item_change' => [
                        'item_id' => $itemId,
                        'item_quantity' => $quantity
                    ]
                ], 'Thay đổi vật phẩm thành công');

                // Cập nhật điểm cho người dùng
                $updatePoint = $this->updatePoint($userId, $point, "add");
                if ($updatePoint['success']) {
                    return [
                        'success' => true,
                        'message' => 'Cập nhật vật phẩm thành công'
                    ];
                } else {
                    // Nếu cập nhật điểm không thành công, rollback transaction từ hàm gọi
                    throw new \Exception('Cập nhật điểm không thành công __001');
                }
            } else {
                // Nếu cập nhật vật phẩm không thành công, rollback transaction từ hàm gọi
                throw new \Exception('Cập nhật vật phẩm không thành công __002');
            }
        } catch (\Exception $e) {
            // Ném ngoại lệ để transaction có thể rollback từ hàm gọi
            throw $e;
        }
    }

    public function updatePoint($userId, $point, $action = 'add')
    {
        try {
            // Lấy thông tin người dùng từ session
            $user = session()->get('user');
            if ($userId != $user['user_id']) {
                return [
                    'success' => false,
                    'message' => 'Phiên đăng nhập thất bại'
                ];
            }

            // Lấy thông tin người dùng từ database
            $userInfo = $this->userModel->where('user_id', $userId)->first(['user_id', 'user_name', 'points']);
            if (!$userInfo) {
                throw new \Exception('Người dùng không tồn tại __003');
            }
            if($point == 0){
                throw new \Exception('Số điểm không hợp lệ __003');
            }
            $pointOld = $userInfo['points'];

            // Kiểm tra và cập nhật điểm
            if ($action === 'add') {
                $pointNew = $pointOld + $point;
            } else if ($action === 'minus') {
                $pointNew = $pointOld - $point;
            } else {
                throw new \Exception('Hành động không hợp lệ __004');
            }

            // Cập nhật điểm của người dùng
            $update = $this->userModel->where('user_id', $userId)->update([
                'points' => $pointNew
            ]);

            if (!$update) {
                throw new \Exception('Cập nhật điểm không thành công __005');
            }

            // Ghi log thay đổi điểm
            if ($action == 'add') {
                $this->logService->log($userId, 'update_point', ['pointOld' => $pointOld, 'pointNew' => $pointNew], "Nhận thêm {$point} tu vi", $point);
            } else if ($action == 'minus') {
               $this->logService->log($userId, 'update_point', ['pointOld' => $pointOld, 'pointNew' => $pointNew], "Trừ ra {$point} tu vi", $point);
            }
            return [
                'success' => true,
                'message' => 'Cập nhật điểm thành công'
            ];
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
