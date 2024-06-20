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

    public function findByEmail($email){
        return $this->userRepository->findByEmail($email);
    }

    public function createUserLoginGoogle($data){
        return $this->userRepository->createUserLoginGoogle($data);
    }

    public function updateLastLogin($userId){
        return $this->userRepository->updateLastLogin($userId);
    }

    public function addItem($itemId, $itemQuantity){
        return $this->userRepository->addItem($itemId, $itemQuantity);
    }
}

