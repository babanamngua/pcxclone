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
        'name',
        'email',
        'sdt',
        'address',
        'total_price',
        'shipping_methods_id',
        'status'
        ];
        public $timestamps = true; // Đảm bảo timestamps được bật
}
