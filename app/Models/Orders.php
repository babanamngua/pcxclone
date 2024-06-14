<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total_price'
        ];
        public $timestamps = true; // Đảm bảo timestamps được bật
}
