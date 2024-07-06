<?php

namespace App\Repositories\Mine;

use App\Models\Item;
use App\Models\Mine;
use App\Services\LogService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EloquentMineRepository implements MineRepositoryInterface
{
    protected $mineModel;
    protected $itemModel;
    protected $logService;
    protected $userService;
    public function __construct(Mine $mineModel, Item $itemModel, UserService $userService, LogService $logService)
    {
        $this->mineModel = $mineModel;
        $this->itemModel = $itemModel;
        $this->userService = $userService;
        $this->logService = $logService;
    }

    public function getLastMine($userId)
    {
        $lastMine = $this->mineModel->where('user_id', $userId)->first();

        if ($lastMine) {
            return $lastMine->mined_at;
        } else {
            // Nếu không tìm thấy bản ghi, tạo một bản ghi mới với thời gian mined_at là một thời gian trong quá khứ
            $this->mineModel->insert([
                'user_id' => $userId,
                'mined_at' => Carbon::now()->subHours(5)->timestamp // Đảm bảo mined_at là timestamp
            ]);
            // Trả về giá trị mined_at mới tạo để có thể khai thác ngay lập tức
            return Carbon::now()->subHours(5)->timestamp;
        }
    }

    public function mine($userId)
    {
        try {
            DB::beginTransaction();

            // Kiểm tra thời gian khai thác gần nhất
            $lastMineTimestamp = $this->getLastMine($userId);
            if ($lastMineTimestamp && ((Carbon::now()->getTimestamp() - $lastMineTimestamp) < 4 * 3600)) {
                return [
                    'success' => false,
                    'message' => 'Bạn phải chờ 4 tiếng để khai thác tiếp.'
                ];
            }

            // Lấy danh sách khoáng thạch
            $getListGem = $this->itemModel->where(['item_type' => 'Gem'])->get(['id', 'item_name'])->toArray();
            if (empty($getListGem)) {
                return [
                    'success' => false,
                    'message' => 'Mỏ khai thác hiện tại không được phép vào.'
                ];
            }
            $this->fisherYatesShuffle($getListGem);

            $gems = [];
            $numTypes = 2; // Số loại khoáng thạch
            for ($i = 0; $i < $numTypes; $i++) {
                if (empty($getListGem)) {
                    break; // Nếu danh sách khoáng thạch trống thì dừng lại
                }
                $randomIndex = array_rand($getListGem);
                $gem = $getListGem[$randomIndex];
                $quantity = rand(1, 2); // Số lượng mỗi loại khoáng thạch
                $gem['quantity'] = $quantity;
                $gems[] = $gem;

                // Xóa loại khoáng thạch đã xuất hiện để không xuất hiện lại
                unset($getListGem[$randomIndex]);

                // Cập nhật vật phẩm cho người dùng
                $receiveItem = $this->userService->updateItem($userId, $gem['id'], $quantity, 'add');
                if (!$receiveItem['success']) {
                    throw new \Exception('Khai thác không thành công: không thể cập nhật vật phẩm. (row: 86)');
                }
            }

            $point = 20;
            // Cập nhật điểm cho người dùng
            $receivePoint = $this->userService->updatePoint($userId, $point, 'add');
            if (!$receivePoint['success']) {
                throw new \Exception('Thu hoạch không thành công (row: 93): không thể cập nhật điểm');
            }

            // Ghi log khai thác
            $this->logService->log($userId, 'mine', ['user_id' => $userId, 'gems' => $gems], "Khai thác thành công nhận được " . $this->getGemNamesWithQuantities($gems), $point);

            // Cập nhật thời gian khai thác cuối cùng
            $updated = $this->mineModel->where('user_id', $userId)->update(['mined_at' => Carbon::now()->timestamp]);

            // Commit transaction
            DB::commit();

            return [
                'success' => true,
                'data' => [],
                'message' => "Khai thác thành công nhận được " . $this->getGemNamesWithQuantities($gems)
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi khi khai thác: ' . $e->getMessage(), [
                'user_id' => $userId,
                'exception' => $e
            ]);

            return [
                'success' => false,
                'message' => 'Hang mỏ có nguy hiểm không thể khai thác. Vui lòng thử lại sau.'
            ];
        }
    }

    private function getGemNamesWithQuantities($gems)
    {
        $names = [];
        foreach ($gems as $gem) {
            $names[] = " x{$gem['quantity']} {$gem['item_name']}";
        }
        return implode(', ', $names);
    }

    private function fisherYatesShuffle(&$array)
    {
        $n = count($array);
        for ($i = $n - 1; $i > 0; $i--) {
            $j = mt_rand(0, $i);
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
        }
    }
}
