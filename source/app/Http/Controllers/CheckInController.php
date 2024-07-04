<?php

namespace App\Http\Controllers;

use App\Services\CheckInService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    protected $checkInService;

    public function __construct(CheckInService $checkInService)
    {
        $this->checkInService = $checkInService;
    }

    public function index()
    {
        $userID = session()->get('user')['user_id'];
        $checked = false;
        $countCheckIn = 0;

        $checkIn = $this->checkInService->getCheckIn($userID);

        if ($checkIn) {
            $countCheckIn = $checkIn->count_checkin;
            if ($checkIn->before_checkin == Carbon::now()->format('d/m/Y')) {
                $checked = true;
            }
        }

        return view('checkin.index', [
            'countCheckIn' => $countCheckIn,
            'checked' => $checked,
        ]);
    }

    public function checkIn(Request $request)
    {
        if ($request->expectsJson()) {
            $userID = session()->get('user')['user_id'];
            $checkInAction = $this->checkInService->checkIn($userID);
            return $checkInAction['success']
                ? responseSuccess([], $checkInAction['message'], 200)
                : responseError($checkInAction['message'], 500, []);
        } else {
            return redirect()->route('checkin')->with('error', 'Điểm danh không thành công!');
        }
    }
}
