<?php

namespace App\Repositories\Item;

interface ItemRepositoryInterface
{
    public function getAllItems();
    public function buy($userId, $itemId);
    public function sell($userId, $itemId);
}
