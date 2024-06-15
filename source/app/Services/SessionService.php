<?php

namespace App\Services;

use App\Repositories\Contracts\SessionRepositoryInterface;

class SessionService
{
    protected $sessionRepository;

    public function __construct(SessionRepositoryInterface $sessionRepository)
    {
        $this->sessionRepository = $sessionRepository;
    }

    public function getById($id)
    {
        return $this->sessionRepository->getById($id);
    }

    public function getByUserId($userId)
    {
        return $this->sessionRepository->getByUserId($userId);
    }

    public function create(array $attributes)
    {
        return $this->sessionRepository->create($attributes);
    }

    public function update($session, array $attributes)
    {
        $session = $this->sessionRepository->getById($session);
        return $this->sessionRepository->update($session, $attributes);
    }

    public function delete($session)
    {
        $session = $this->sessionRepository->getById($session);
        $this->sessionRepository->delete($session);
    }
}
