<?php

namespace App\Http\Controllers;

use App\Services\MineService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MineController extends Controller
{
    protected $mineService;

    public function __construct(MineService $mineService){
        $this->mineService = $mineService;
    }

    public function index(){
        $user = session()->get('user');
        $time = $this->mineService->getLastMine($user['user_id']);
        return view('mine.index',[
            'time' => $time,
        ]);
    }

    public function mine(Request $request)
    {
        if ($request->expectsJson()) {
            $userID = session()->get('user')['user_id'];
            $mineAction = $this->mineService->mine($userID);
            return $mineAction['success']
                ? responseSuccess([], $mineAction['message'], 200)
                : responseError($mineAction['message'], 500, []);
        } else {
            return redirect()->route('checkin')->with('error', 'Điểm danh không thành công!');
        }
    }
}

