<?php

namespace App\Repositories\Session;

use App\Models\Session;
use App\Repositories\Session\SessionRepositoryInterface;

class EloquentSessionRepository implements SessionRepositoryInterface
{
    public function getById($id)
    {
        return Session::findOrFail($id);
    }

    public function getByUserId($userId)
    {
        return Session::where('user_id', $userId)->get();
    }

    public function create(array $attributes)
    {
        return Session::create($attributes);
    }

    public function update(Session $session, array $attributes)
    {
        $session->update($attributes);
        return $session->fresh();
    }

    public function delete(Session $session)
    {
        $session->delete();
    }
}
