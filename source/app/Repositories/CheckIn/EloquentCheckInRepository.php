<?php

namespace App\Repositories\CheckIn;

use App\Models\CheckIn;
use Carbon\Carbon;
use App\Services\LogService;

class EloquentCheckInRepository implements CheckinRepositoryInterface
{
    protected $checkInModel;
    protected $logService;

    public function __construct(
        CheckIn $checkInModel,
        LogService $logService
    )
    {
        $this->checkInModel = $checkInModel;
        $this->logService = $logService;
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
                $this->logService->log($userId, 'checkin', $createCheckIn, "Bạn đã điểm danh thành công ngày thứ 1");
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
                    //...
                    //
                    $checkIn->count_checkin = 15;
                    $checkIn->before_checkin = Carbon::now()->format('d/m/Y');
                    $checkIn->save();
                    $this->logService->log($userId, 'checkin', $checkIn, "Bạn đã điểm danh thành công ngày thứ 15");
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
                    $this->logService->log($userId, 'checkin', $checkIn, "Bạn đã điểm danh thành công ngày thứ 1");
                    return [
                        'success' => true,
                        'message' => 'Bạn đã điểm danh thành công'
                    ];
                }
                $checkIn->count_checkin = $checkIn->count_checkin + 1;
                $checkIn->before_checkin = Carbon::now()->format('d/m/Y');
                $checkIn->save();
                $this->logService->log($userId, 'checkin', $checkIn, "Bạn đã điểm danh thành công ngày thứ ". $checkIn->count_checkin);
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
