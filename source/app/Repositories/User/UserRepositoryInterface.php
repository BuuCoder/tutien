<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function login($data);
    public function findByEmail($email);
    public function getUserInfo($email);
    public function getUserInfoById($userId);
    public function createUserLoginGoogle($data);
    public function updateLastLogin($userId);
    public function updateItem($userId, $itemId, $quantity, $action);
    public function updatePoint($userId, $point, $action);
    public function updateMoney($userId, $point, $action);
    public function updateBadge($userId, $point, $action);
    public function updatePotion($userId, $itemId, $quantity, $action);
}
