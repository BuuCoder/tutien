<?php

namespace App\Http\Controllers;

use App\Services\CheckInService;
use Carbon\Carbon;

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

    public function checkIn()
    {
        $userID = session()->get('user')['user_id'];
        $countCheckIn = $this->checkInService->checkIn($userID);

        dd($countCheckIn);
    }
}
