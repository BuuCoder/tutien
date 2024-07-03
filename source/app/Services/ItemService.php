<?php

namespace App\Services;

use App\Repositories\Item\ItemRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class ItemService
{
    protected $itemRepository;
    public function __construct(ItemRepositoryInterface $itemRepository){
        $this->itemRepository = $itemRepository;
    }

    public function getAllItems(){
        return $this->itemRepository->getAllItems();
    }

    public function checkCacheItems(){
        $minutes = 24*60;

        if (!Cache::has('items_data')) {
            $items = Cache::remember('items_data', $minutes, function () {
                return $this->getAllItems();
            });
        } else {
            $items = Cache::get('items_data');
        }

        $transformedItemData = [];

        foreach ($items as $item) {
            $id = $item['id'];
            $transformedItemData[$id] = [
                'item_name' => $item['item_name'],
                'item_price' => $item['item_price'],
                'item_description' => $item['item_description'],
                'item_image' => $item['item_image'],
                'item_type' => $item['item_type'],
            ];
        }

        return $transformedItemData;
    }

    public function buyItem($userId, $itemId)
    {
        return $this->itemRepository->buy($userId, $itemId);
    }

    public function sellItem($userId, $itemId)
    {
        return $this->itemRepository->sell($userId, $itemId);
    }
}
