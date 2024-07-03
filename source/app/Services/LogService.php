<?php

namespace App\Services;
use App\Models\Log;
use Carbon\Carbon;

class LogService
{
    protected $logModel;
    public function __construct(Log $logModel){
        $this->logModel = $logModel;
    }
    public function log($userId, $action, $data, $descrtiption, $point = 0){
        try {
            $this->logModel->create([
                'user_id' => $userId,
                'action' => $action,
                'data' => json_encode($data),
                'description' => $descrtiption,
                'point' => $point,
                'created_at' => time(),
            ]);
        }catch (\Exception $e){
            throw new \Exception('Cập nhật log không thành công (row: 24) : '. $e->getMessage());
        }
    }

    public function getLogByUserId($userId){
        $accept_action = [
            'garden_harvest',
            'check_in',
            'update_point'
        ];

        $startDate = Carbon::now()->subDays(1)->startOfDay()->timestamp;
        $endDate = Carbon::now()->timestamp;

        return $this->logModel
            ->select('description','created_at')
            ->whereIn('action', $accept_action)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
