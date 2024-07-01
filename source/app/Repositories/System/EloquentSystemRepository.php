<?php

namespace App\Repositories\System;

use App\Models\System;

class EloquentSystemRepository implements SystemRepositoryInterface
{
    protected $systemModel;
    public function __construct(System $systemModel){
        $this->systemModel = $systemModel;
    }

    public function getAllSystem(){
        return $this->systemModel->where([
            'system_active' => "Y",
        ])->get();
    }
}
