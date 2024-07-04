<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Services\GardenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GardenController
{
    protected $gardenService;
    protected $allPot;

    public function __construct(GardenService $gardenService)
    {
        $this->gardenService = $gardenService;
        try {
            $this->allPot = $this->gardenService->checkCachePot();
        } catch (\Exception $e) {
            Log::error('Lấy dữ liệu từ cache có lỗi trong GardenController: ' . $e->getMessage());
            Redirect::route('garden')->with('error', 'Dược điền hiện không khả dụng vui lòng liên hệ với Admin')->send();
            abort(302);
        }
    }

    public function index()
    {
        $user = session()->get('user');
        $listPotUser = $this->gardenService->checkPot($user['user_id']);
        $allPot = $this->allPot;
        $dataPortUser = [];
        foreach ($listPotUser as $portUser) {
            $dataPortUser[$portUser->pot_id] = $portUser;
        }
        return view('garden.index', [
            'dataPortUser' => $dataPortUser,
            'dataAllPot' => $allPot
        ]);
    }

    public function grow(Request $request)
    {
        try {
            if ($request->expectsJson()) {
                $potId = $request->input('potId');
                $user = session()->get('user');
                $grow = $this->gardenService->grow($user['user_id'], $potId);
                return $grow['success']
                    ? responseSuccess([], $grow['message'], 200)
                    : responseError($grow['message'], 400, []);
            }
            return redirect()->route('garden')->with('error', 'Không thể gieo hạt');
        } catch (\Exception $e) {
            Log::error('Gieo hạt thất bại lỗi: ' . $e->getMessage());

            if ($request->expectsJson()) {
                return responseError('Không thể gieo hạt', 500, []);
            }
            return redirect()->route('garden')->with('error', 'Không thể gieo hạt');
        }
    }

    public function harvest(Request $request)
    {
        try {
            if ($request->expectsJson()) {
                $potId = $request->input('potId');
                $user = session()->get('user');
                $harvest = $this->gardenService->harvest($user['user_id'], $potId);
                return $harvest['success']
                    ? responseSuccess([], $harvest['message'], 200)
                    : responseError($harvest['message'], 400, []);
            }
            return redirect()->route('garden')->with('error', 'Không thể thu hoạch');
        } catch (\Exception $e) {
            Log::error('Thu hoạch thất bại lỗi: ' . $e->getMessage());

            if ($request->expectsJson()) {
                return responseError('Không thể thu hoạch', 500, []);
            }
            return redirect()->route('garden')->with('error', 'Không thể thu hoạch');
        }
    }

}
