<?php

namespace App\Repositories\PasswordResetToken;

use App\Models\PasswordResetToken;
use App\Repositories\PasswordResetToken\PasswordResetTokenRepositoryInterface;

class EloquentPasswordResetTokenRepository implements PasswordResetTokenRepositoryInterface
{
    public function getByEmail($email)
    {
        return PasswordResetToken::where('email', $email)->firstOrFail();
    }

    public function create(array $attributes)
    {
        return PasswordResetToken::create($attributes);
    }

    public function update(PasswordResetToken $token, array $attributes)
    {
        $token->update($attributes);
        return $token->fresh();
    }

    public function delete(PasswordResetToken $token)
    {
        $token->delete();
    }
}
