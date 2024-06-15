<?php

namespace App\Repositories\Session;

use App\Models\Session;

interface SessionRepositoryInterface
{
    public function getById($id);
    public function getByUserId($userId);
    public function create(array $attributes);
    public function update(Session $session, array $attributes);
    public function delete(Session $session);
}

