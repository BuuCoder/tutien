<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function login($data);
    public function findByEmail($email);
    public function createUserLoginGoogle($data);
    public function updateLastLogin($userId);
    public function addItem($itemId, $itemQuantity);
}
