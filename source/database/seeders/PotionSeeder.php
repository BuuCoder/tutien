<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('potion')->insert([
            [
                'id' => null,
                'name' => 'Hạ Phẩm Đan Dược',
                'image' => 'path/to/image/ha_pham.png',
                'crafting_time' => 2,
                'required_ingredients' => json_encode(['1' => 5, '2' => 5, '3' => 5, '4' => 5, '5' => 5]),
                'reward_points' => 1000
            ],
            [
                'id' => null,
                'name' => 'Trung Phẩm Đan Dược',
                'image' => 'path/to/image/trung_pham.png',
                'crafting_time' => 4,
                'required_ingredients' => json_encode(['1' => 10, '2' => 10, '3' => 10, '4' => 10, '5' => 10]),
                'reward_points' => 2500
            ],
            [
                'id' => null,
                'name' => 'Thượng Phẩm Đan Dược',
                'image' => 'path/to/image/thuong_pham.png',
                'crafting_time' => 6,
                'required_ingredients' => json_encode(['1' => 20, '2' => 20, '3' => 20, '4' => 20, '5' => 20]),
                'reward_points' => 6000
            ],
        ]);
    }
}

