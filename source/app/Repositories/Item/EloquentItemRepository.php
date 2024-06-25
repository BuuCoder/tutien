<?php

namespace App\Repositories\Item;

use App\Models\Item;

class EloquentItemRepository implements ItemRepositoryInterface
{
    protected $itemModel;
    public function __construct(Item $itemModel){
        $this->itemModel = $itemModel;
    }
    public function getAllItems(){
        return $this->itemModel->all();
    }
}
