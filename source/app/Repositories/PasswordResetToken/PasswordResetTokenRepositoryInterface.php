<?php

namespace App\Repositories\PasswordResetToken;

use App\Models\PasswordResetToken;

interface PasswordResetTokenRepositoryInterface
{
    public function getByEmail($email);
    public function create(array $attributes);
    public function update(PasswordResetToken $token, array $attributes);
    public function delete(PasswordResetToken $token);
}
