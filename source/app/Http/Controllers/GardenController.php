<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Services\GardenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class GardenController
{
    protected $gardenService;
    protected $allPot;
    public function __construct(GardenService $gardenService){
        $this->gardenService = $gardenService;
        $this->allPot = $this->checkCachePot();
    }

    public function index(){
        $user = session()->get('user');
        $listPotUser = $this->gardenService->checkPot($user['user_id']);
        $allPot = $this->allPot;
        $dataPortUser = [];
        foreach($listPotUser as $portUser){
            $dataPortUser[$portUser->pot_id] = $portUser;
        }
        return view('garden.index',[
            'dataPortUser' => $dataPortUser,
            'dataAllPot' => $allPot
        ]);
    }

    public function grow(Request $request){
        try {
            $potId = $request->input('potId');
            $user = session()->get('user');
            $grow = $this->gardenService->grow($user['user_id'], $potId);
            if ($grow['success']) {
                return redirect()->route('garden')->with('success', $grow['message']);
            }
            return redirect()->route('garden')->with('error', $grow['message']);
        }catch (\Exception $e){
            dd($e);
            Log::error('Gieo hạt thất bại lỗi: '. $e->getMessage());
            return redirect()->route('garden')->with('error', 'Không thể gieo hạt');
        }
    }

    public function harvest(){

    }

    public function checkCachePot(){
        $minutes = 24*60;

        if (!Cache::has('pots_data')) {
            $pots = Cache::remember('pots_data', $minutes, function () {
                return $this->gardenService->getAllPot();
            });
        } else {
            $pots = Cache::get('pots_data');
        }

        return $pots;
    }
}
