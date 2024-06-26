<?php

namespace App\Services;
use App\Models\Log;

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
            throw new \Exception('Cập nhật log không thành công __009 : '. $e->getMessage());
        }
    }
}
