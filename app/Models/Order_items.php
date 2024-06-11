<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_item_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'quantity',
        'price',
        ];
        public $timestamps = true; // Đảm bảo timestamps được bật
}
