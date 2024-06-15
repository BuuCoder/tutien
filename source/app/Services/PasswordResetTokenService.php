<?php

namespace App\Services;

use App\Repositories\PasswordResetToken\PasswordResetTokenRepositoryInterface;

class PasswordResetTokenService
{
    protected $passwordResetTokenRepository;

    public function __construct(PasswordResetTokenRepositoryInterface $passwordResetTokenRepository)
    {
        $this->passwordResetTokenRepository = $passwordResetTokenRepository;
    }

    public function getByEmail($email)
    {
        return $this->passwordResetTokenRepository->getByEmail($email);
    }

    public function create(array $attributes)
    {
        return $this->passwordResetTokenRepository->create($attributes);
    }

    public function update($token, array $attributes)
    {
        $token = $this->passwordResetTokenRepository->getByEmail($token);
        return $this->passwordResetTokenRepository->update($token, $attributes);
    }

    public function delete($token)
    {
        $token = $this->passwordResetTokenRepository->getByEmail($token);
        $this->passwordResetTokenRepository->delete($token);
    }
}
