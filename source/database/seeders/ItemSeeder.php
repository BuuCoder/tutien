<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'item_name' => 'Linh Dược Hỏa',
                'item_image' => 'linh-duoc-hoa.png',
                'item_price' => 100.00,
                'item_type' => 'Tree',
                'item_description' => 'Nguyên liệu luyện đan'
            ],
            [
                'item_name' => 'Linh Dược Kim',
                'item_image' => 'linh-duoc-kim.png',
                'item_price' => 100.00,
                'item_type' => 'Tree',
                'item_description' => 'Nguyên liệu luyện đan'
            ],
            [
                'item_name' => 'Linh Dược Mộc',
                'item_image' => 'linh-duoc-moc.png',
                'item_price' => 100.00,
                'item_type' => 'Tree',
                'item_description' => 'Nguyên liệu luyện đan'
            ],
            [
                'item_name' => 'Linh Dược Thủy',
                'item_image' => 'linh-duoc-thuy.png',
                'item_price' => 100.00,
                'item_type' => 'Tree',
                'item_description' => 'Nguyên liệu luyện đan'
            ],
            [
                'item_name' => 'Linh Dược Thổ',
                'item_image' => 'linh-duoc-tho.png',
                'item_price' => 100.00,
                'item_type' => 'Tree',
                'item_description' => 'Nguyên liệu luyện đan'
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
