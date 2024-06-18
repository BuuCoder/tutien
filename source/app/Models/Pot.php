<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pot extends Model
{
    use HasFactory;

    protected $table = 'pot';
    protected $primaryKey = 'pot_id';

    protected $fillable = [
        'pot_name',
        'pot_growth',
    ];

    // Nếu có quan hệ với model khác, bạn có thể định nghĩa chúng ở đây.
    public function gardens()
    {
        return $this->hasMany(Garden::class, 'pot_id', 'pot_id');
    }
}

