<?php

namespace App\Repositories\CheckIn;

use App\Models\CheckIn;
use App\Services\UserService;
use Carbon\Carbon;
use App\Services\LogService;
use Illuminate\Support\Facades\DB;

class EloquentCheckInRepository implements CheckInRepositoryInterface
{
    protected $checkInModel;
    protected $logService;
    protected $userService;

    public function __construct(
        CheckIn $checkInModel,
        LogService $logService,
        UserService $userService
    )
    {
        $this->checkInModel = $checkInModel;
        $this->logService = $logService;
        $this->userService = $userService;
    }

    public function getCheckIn($userId)
    {
        return $this->checkInModel->where('user_id', $userId)->first();
    }

    public function createCheckIn($userId)
    {
        try {
            DB::beginTransaction();
            $createCheckIn = $this->checkInModel->create([
                'user_id' => $userId,
                'count_checkin' => 1,
                'before_checkin' => Carbon::now()->format('d/m/Y'),
                'received_gift' => 0,
                'created_at' => time()
            ]);
            $point = 5;
            $updatePoint = $this->userService->updatePoint($userId, $point);

            if(!$updatePoint['success']){
                throw new \Exception('Cập nhật điểm không thành công __0010');
            }

            if ($createCheckIn) {
                $this->logService->log($userId, 'check_in', $createCheckIn, "Bạn đã điểm danh thành công ngày thứ 1", $point);
                DB::commit();
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
            DB::rollback();
            throw $e;
        }
    }

    public function updateCheckIn(int $userId)
    {
        try {
            DB::beginTransaction();
            $checkIn = $this->getCheckIn($userId);
            $point = 0;
            if (!$checkIn) {
                $createCheckIn = $this->createCheckIn($userId);
                return $createCheckIn;
            }

            if ($checkIn->before_checkin < Carbon::now()->format('d/m/Y')) {
                if (($checkIn->count_checkin + 1) == 15) {

                    $point = 150;
                    $updatePoint = $this->userService->updatePoint($userId, $point);

                    if(!$updatePoint['success']){
                        throw new \Exception('Cập nhật điểm không thành công __0011');
                    }

                    $checkIn->count_checkin = 15;
                    $checkIn->before_checkin = Carbon::now()->format('d/m/Y');
                    $checkIn->save();
                    $this->logService->log($userId, 'check_in', $checkIn, "Bạn đã điểm danh thành công ngày thứ 15", $point);
                    DB::commit();
                    return [
                        'success' => true,
                        'message' => 'Bạn đã điểm danh đầy đủ bạn sẽ nhận được phần thưởng xứng đáng!'
                    ];

                }

                if ($checkIn->count_checkin == 15) {

                    $point = 5;
                    $updatePoint = $this->userService->updatePoint($userId, $point);
                    DB::commit();
                    if(!$updatePoint['success']){
                        throw new \Exception('Cập nhật điểm không thành công __0012');
                    }

                    $checkIn->count_checkin = 1;
                    $checkIn->before_checkin = Carbon::now()->format('d/m/Y');
                    $checkIn->save();
                    $this->logService->log($userId, 'checkin', $checkIn, "Bạn đã điểm danh thành công ngày thứ 1", $point);
                    DB::commit();
                    return [
                        'success' => true,
                        'message' => 'Bạn đã điểm danh thành công'
                    ];
                }
                $checkIn->count_checkin = $checkIn->count_checkin + 1;

                switch ($checkIn->count_checkin){
                    case 11:
                        $point = 60;
                        break;
                    case 12:
                        $point = 70;
                        break;
                    case 13:
                        $point = 80;
                        break;
                    case 14:
                        $point = 90;
                        break;
                    default:
                        $point = $checkIn->count_checkin * 5;
                        break;
                }
                $updatePoint = $this->userService->updatePoint($userId, $point);

                if(!$updatePoint['success']){
                    throw new \Exception('Cập nhật điểm không thành công __0010');
                }

                $checkIn->before_checkin = Carbon::now()->format('d/m/Y');
                $checkIn->save();
                $this->logService->log($userId, 'checkin', $checkIn, "Bạn đã điểm danh thành công ngày thứ {$checkIn->count_checkin}" , $point);
                DB::commit();
                return [
                    'success' => true,
                    'message' => 'Bạn đã điểm danh thành công'
                ];
            } else {
                DB::commit();
                return [
                    'success' => false,
                    'message' => 'Bạn đã điểm danh cho ngày hôm nay rồi'
                ];
            }
        }catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
