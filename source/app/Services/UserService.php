<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($data)
    {
        return $this->userRepository->login($data);
    }

    public function findByEmail($email)
    {
        return $this->userRepository->findByEmail($email);
    }

    public function getUserInfo($email)
    {
        return $this->userRepository->getUserInfo($email);
    }

    public function getUserInfoById($userId)
    {
        return $this->userRepository->getUserInfoById($userId);
    }

    public function createUserLoginGoogle($data)
    {
        return $this->userRepository->createUserLoginGoogle($data);
    }

    public function updateLastLogin($userId)
    {
        return $this->userRepository->updateLastLogin($userId);
    }

    public function updateItem($userId, $itemId, $itemQuantity, $action)
    {
        return $this->userRepository->updateItem($userId, $itemId, $itemQuantity, $action);
    }

    public function updatePoint($userId, $point, $action){
        return $this->userRepository->updatePoint($userId, $point, $action);
    }

    public function updateMoney($userId, $money, $action){
        return $this->userRepository->updateMoney($userId, $money, $action);
    }

    public function updateBadge($userId, $badgeId, $action){
        return $this->userRepository->updateBadge($userId, $badgeId, $action);
    }

    public function updatePotion($userId, $itemId, $quantity, $action){
       return $this->userRepository->updatePotion($userId, $itemId, $quantity, $action);
    }
}

