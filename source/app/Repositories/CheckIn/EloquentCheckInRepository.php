<?php

namespace App\Repositories\CheckIn;

use App\Models\CheckIn;
use App\Repositories\CheckIn\CheckinRepositoryInterface;
use Carbon\Carbon;

class EloquentCheckInRepository implements CheckinRepositoryInterface
{
    protected $checkInModel;

    public function __construct(CheckIn $checkInModel)
    {
        $this->checkInModel = $checkInModel;
    }

    public function getCheckIn($userId)
    {
        return $this->checkInModel->where('user_id', $userId)->first();
    }

    public function createCheckIn($userId)
    {
        try {
            $createCheckIn = $this->checkInModel->create([
                'user_id' => $userId,
                'count_checkin' => 1,
                'before_checkin' => Carbon::now()->format('d/m/Y'),
                'received_gift' => 0,
                'created_at' => time()
            ]);

            if ($createCheckIn) {
                return [
                    'success' => true,
                    'message' => 'Bạn đã điểm danh thành công'
                ];
            }
            return [
                'success' => false,
                'message' => 'Điểm danh không thành công.'
            ];
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function updateCheckIn(int $userId)
    {
        try {
            $checkIn = $this->getCheckIn($userId);

            if (!$checkIn) {
                $createCheckIn = $this->createCheckIn($userId);
                return $createCheckIn;
            }

            if ($checkIn->before_checkin < Carbon::now()->format('d/m/Y')) {
                if (($checkIn->count_checkin + 1) == 15) {
                    //Handle Receive Gift
                    $checkIn->count_checkin = 15;
                    $checkIn->before_checkin = Carbon::now()->format('d/m/Y');
                    $checkIn->save();
                    return [
                        'success' => true,
                        'message' => 'Bạn đã điểm danh đầy đủ bạn sẽ nhận được phần thưởng xứng đáng!'
                    ];
                }

                if ($checkIn->count_checkin == 15) {
                    //Reset check in 1
                    $checkIn->count_checkin = 1;
                    $checkIn->before_checkin = Carbon::now()->format('d/m/Y');
                    $checkIn->save();
                    return [
                        'success' => true,
                        'message' => 'Bạn đã điểm danh thành công'
                    ];
                }
                $checkIn->count_checkin = $checkIn->count_checkin + 1;
                $checkIn->before_checkin = Carbon::now()->format('d/m/Y');
                $checkIn->save();
                return [
                    'success' => true,
                    'message' => 'Bạn đã điểm danh thành công'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Bạn đã điểm danh cho ngày hôm nay rồi'
                ];
            }
        }catch(\Exception $e) {
            throw $e;
        }
    }
}
