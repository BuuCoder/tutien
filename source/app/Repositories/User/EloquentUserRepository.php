<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function getByEmail($email)
    {
        return User::where('email', $email)->firstOrFail();
    }

    public function create(array $attributes)
    {
        return User::create($attributes);
    }

    public function update(User $user, array $attributes)
    {
        $user->update($attributes);
        return $user->fresh();
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
