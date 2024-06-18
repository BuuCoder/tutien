<?php

namespace App\Services;
use App\Models\Log;

class LogService
{
    protected $logModel;
    public function __construct(Log $logModel){
        $this->logModel = $logModel;
    }
    public function log($userId, $action, $data, $descrtiption){
        $this->logModel->create([
            'user_id' => $userId,
            'action' => $action,
            'data' => json_encode($data),
            'description' => $descrtiption,
            'created_at' => time(),
        ]);
    }
}
