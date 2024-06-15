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

    public function getUserById($id)
    {
        return $this->userRepository->getById($id);
    }

    public function updateUser($id, array $attributes)
    {
        $user = $this->userRepository->getById($id);
        return $this->userRepository->update($user, $attributes);
    }

    public function deleteUser($id)
    {
        $user = $this->userRepository->getById($id);
        $this->userRepository->delete($user);
    }
}

