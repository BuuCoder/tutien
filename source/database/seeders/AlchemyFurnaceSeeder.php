<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlchemyFurnaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alchemy_furnace')->insert([
            [
                'id' => null,
                'name' => 'Lô Đỉnh Hạ Phẩm',
                'image' => 'path/to/image/ha_pham_furnace.png',
                'usage_fee' => 0,
                'time_reduction_percentage' => 0
            ],
            [
                'id' => null,
                'name' => 'Lô Đỉnh Trung Phẩm',
                'image' => 'path/to/image/trung_pham_furnace.png',
                'usage_fee' => 150,
                'time_reduction_percentage' => 10
            ],
            [
                'id' => null,
                'name' => 'Lô Đỉnh Thượng Phẩm',
                'image' => 'path/to/image/thuong_pham_furnace.png',
                'usage_fee' => 300,
                'time_reduction_percentage' => 30
            ],
        ]);
    }
}
