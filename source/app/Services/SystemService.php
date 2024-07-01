<?php

namespace App\Services;

use App\Repositories\System\SystemRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class SystemService
{
    protected $systemRepository;
    public function __construct(SystemRepositoryInterface $systemRepository)
    {
        $this->systemRepository = $systemRepository;
    }

    public function checkCacheSystems(){
        $minutes = 24*60;

        if (!Cache::has('system_data')) {
            $systems = Cache::remember('system_data', $minutes, function () {
                return $this->systemRepository->getAllSystem();
            });
        } else {
            $systems = Cache::get('system_data');
        }

        $transformedItemData = [];

        foreach ($systems as $system) {
            $id = $system['system_id'];
            $transformedItemData[$id] = [
                'system_name' => $system['system_name'],
            ];
        }

        return $transformedItemData;
    }
}
