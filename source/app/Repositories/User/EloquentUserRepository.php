<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EloquentUserRepository implements UserRepositoryInterface
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
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
}
