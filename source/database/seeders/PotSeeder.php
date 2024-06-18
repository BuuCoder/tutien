<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pot;

class PotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pot::create(['pot_name' => 'Chậu 1', 'pot_growth' => '2']);
        Pot::create(['pot_name' => 'Chậu 2', 'pot_growth' => '4']);
        Pot::create(['pot_name' => 'Chậu 3', 'pot_growth' => '6']);
    }
}

