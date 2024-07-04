<?php

namespace App\Repositories\CheckIn;

use App\Models\CheckIn;
use App\Services\UserService;
use Carbon\Carbon;
use App\Services\LogService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

            if (!$createCheckIn) {
                throw new \Exception('Báo danh không thành công (row: 48)');
            }

            $point = 5;
            $updatePoint = $this->userService->updatePoint($userId, $point);

            if (!$updatePoint['success']) {
                throw new \Exception('Cập nhật điểm không thành công (row: 55)');
            }

            $this->logService->log($userId, 'check_in', $createCheckIn, "Bạn đã báo danh thành công ngày thứ 1", $point);

            DB::commit();

            return [
                'success' => true,
                'message' => 'Bạn đã báo danh thành công'
            ];
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Error in createCheckIn: ' . $e->getMessage(), [
                'user_id' => $userId,
                'exception' => $e
            ]);

            return [
                'success' => false,
                'message' => 'Có lỗi xảy ra trong quá trình báo danh. Vui lòng thử lại sau.'
            ];
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
                if (!$createCheckIn['success']) {
                    DB::rollBack();
                    Log::error('Error in createCheckIn: ' . $createCheckIn['message'], [
                        'user_id' => $userId
                    ]);
                    return [
                        'success' => false,
                        'message' => $createCheckIn['message']
                    ];
                }
                DB::commit();
                return $createCheckIn;
            }

            $beforeCheckinDate = Carbon::createFromFormat('d/m/Y', $checkIn->before_checkin)->startOfDay();
            $today = Carbon::now()->startOfDay();

            if ($beforeCheckinDate->gte($today)) {
                DB::commit();
                return [
                    'success' => false,
                    'message' => 'Bạn đã báo danh cho ngày hôm nay rồi'
                ];
            }

            $checkIn->count_checkin = ($checkIn->count_checkin == 15) ? 1 : $checkIn->count_checkin + 1;

            $point = match ($checkIn->count_checkin) {
                1 => 5,
                11 => 60,
                12 => 70,
                13 => 80,
                14 => 90,
                15 => 150,
                default => $checkIn->count_checkin * 5,
            };

            $updatePoint = $this->userService->updatePoint($userId, $point, 'add');
            if (!$updatePoint['success']) {
                DB::rollBack();
                Log::error('Error in updatePoint: ' . $updatePoint['message'], [
                    'user_id' => $userId
                ]);
                return [
                    'success' => false,
                    'message' => $updatePoint['message']
                ];
            }

            $checkIn->before_checkin = Carbon::now()->format('d/m/Y');
            $checkIn->save();

            $logMessage = ($checkIn->count_checkin == 1) ? "Bạn đã báo danh thành công ngày thứ 1" : "Bạn đã báo danh thành công ngày thứ {$checkIn->count_checkin}";
            $this->logService->log($userId, 'checkin', $checkIn, $logMessage, $point);

            DB::commit();
            return [
                'success' => true,
                'message' => 'Bạn đã báo danh thành công'
            ];

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error in updateCheckIn: ' . $e->getMessage(), [
                'user_id' => $userId,
                'exception' => $e
            ]);

            return [
                'success' => false,
                'message' => 'Có lỗi xảy ra trong quá trình báo danh. Vui lòng thử lại sau.'
            ];
        }
    }
}
