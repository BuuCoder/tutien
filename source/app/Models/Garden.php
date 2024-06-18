<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    use HasFactory;

    protected $table = 'garden';
    protected $primaryKey = 'garden_id';

    protected $fillable = [
        'user_id',
        'pot_id',
        'pot_time_start'
    ];

    // Nếu có quan hệ với model khác, bạn có thể định nghĩa chúng ở đây.
    public function pot()
    {
        return $this->belongsTo(Pot::class, 'pot_id', 'pot_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

