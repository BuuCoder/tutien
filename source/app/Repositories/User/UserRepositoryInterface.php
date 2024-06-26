<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function login($data);
    public function findByEmail($email);
    public function getUserInfo($email);
    public function createUserLoginGoogle($data);
    public function updateLastLogin($userId);
    public function updateItem($userId, $itemId, $itemQuantity, $point);
    public function updatePoint($userId, $point, $action);
}
