<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    // Tên bảng tương ứng trong database
    protected $table = 'badge';

    // Các thuộc tính có thể gán giá trị hàng loạt
    protected $fillable = [
        'badge_name',
        'badge_image',
        'badge_price',
        'badge_description',
        'badge_buy',
        'created_at',
        'updated_at'
    ];
}
