<?php

namespace App\Http\Controllers;

use App\Services\AlchemyFurnaceService;
use App\Services\CraftPotionService;
use App\Services\PotionService;
use Illuminate\Http\Request;

class CraftPotionController extends Controller
{
    protected $craftPotionService;
    protected $alchemyService;
    protected $potionService;
    protected $allAchemyFunnaces;
    protected $allPotion;

    public function __construct(
        CraftPotionService $craftPotionService,
        AlchemyFurnaceService $alchemyFurnaceService,
        PotionService $potionService
    ){
        $this->craftPotionService = $craftPotionService;
        $this->alchemyService = $alchemyFurnaceService;
        $this->potionService = $potionService;
        $this->allAchemyFunnaces = $this->alchemyService->checkCacheFurnaces();
        $this->allPotion = $this->potionService->checkCachePotions();
    }

    public function index()
    {
        $user = session()->get('user');
        $userId = $user['user_id'];

        $furnaces = $this->allAchemyFunnaces;
        $userPotions = $this->craftPotionService->getUserPotions($userId);

        $furnaceStatus = [];

        foreach ($furnaces as $furnaceId => $furnace) {
            if (isset($userPotions[$furnaceId])) {
                $craftingEndTime = $userPotions[$furnaceId]['created_at'] + $userPotions[$furnaceId]['crafting_time'] * 3600;
                $remainingTime = $craftingEndTime - time();
                if ($remainingTime > 0) {
                    $furnaceStatus[$furnaceId] = [
                        'status' => 'crafting',
                        'remaining_time' => $remainingTime,
                        'potion' => $userPotions[$furnaceId]['potion_name'],
                    ];
                } else {
                    $furnaceStatus[$furnaceId] = [
                        'status' => 'completed',
                        'potion' => $userPotions[$furnaceId]['potion_name'],
                    ];
                }
            } else {
                $furnaceStatus[$furnaceId] = [
                    'status' => 'available',
                ];
            }
        }
//        dd($furnaces, $furnaceStatus, $this->allPotion);
        return view('craft_potion.index', [
            'furnaces' => $furnaces,
            'furnaceStatus' => $furnaceStatus,
            'potions' => $this->allPotion,
        ]);
    }

    public function craft(Request $request){
        $data = $request->validate([
            'furnace_id' => 'required|integer',
            'potion_id' => 'required|integer',
        ]);

        $user = session()->get('user');
        $userId = $user['user_id'];

        $data['user_id'] = $userId;

        $result = $this->craftPotionService->craftPotion($data);

        if ($result['success']) {
            return response()->json(['success' => true, 'message' => 'Bắt đầu luyện đan dược thành công!']);
        } else {
            return response()->json(['success' => false, 'message' => $result['message']], 400);
        }
    }
}
