<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getById($id);
    public function getByEmail($email);
    public function create(array $attributes);
    public function update(User $user, array $attributes);
    public function delete(User $user);
}
