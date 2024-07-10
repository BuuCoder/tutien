<?php

namespace App\Http\Controllers;

use App\Services\AlchemyFurnaceService;
use App\Services\CraftPotionService;
use App\Services\PotionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        return view('craft_potion.index', [
            'furnaces' => $furnaces,
            'furnaceStatus' => $furnaceStatus,
            'potions' => $this->allPotion,
        ]);
    }


    public function craft(Request $request)
    {
        try {
            if ($request->expectsJson()) {
                $data = $request->validate([
                    'furnace_id' => 'required|integer',
                    'potion_id' => 'required|integer',
                ]);

                $user = session()->get('user');
                $userId = $user['user_id'];

                $result = $this->craftPotionService->craftPotion($userId, $data['potion_id'], $data['furnace_id']);

                return $result['success']
                    ? responseSuccess([], $result['message'], 200)
                    : responseError($result['message'], 400, []);
            }
            return redirect()->route('craft_potion')->with('error', 'Không thể bắt đầu luyện đan dược');
        } catch (\Exception $e) {
            Log::error('Lỗi khi bắt đầu luyện đan dược (row: 92): ' . $e->getMessage());

            if ($request->expectsJson()) {
                return responseError('Không thể bắt đầu luyện đan dược', 500, []);
            }
            return redirect()->route('craft_potion')->with('error', 'Không thể bắt đầu luyện đan dược');
        }
    }

    public function collect(Request $request)
    {
        try {
            if ($request->expectsJson()) {
                $user = session()->get('user');
                $userId = $user['user_id'];
                $furnaceId = $request->input('furnace_id');

                $result = $this->craftPotionService->collectPotion($userId, $furnaceId);

                return $result['success']
                    ? responseSuccess([], $result['message'], 200)
                    : responseError($result['message'], 400, []);
            }
            return redirect()->route('craft_potion.index')->with('error', 'Không thể nhận đan dược');
        } catch (\Exception $e) {
            Log::error('Không thể nhận đan dược (row: 117): ' . $e->getMessage());

            if ($request->expectsJson()) {
                return responseError('Không thể nhận đan dược', 500, []);
            }
            return redirect()->route('craft_potion.index')->with('error', 'Không thể nhận đan dược');
        }
    }

}
