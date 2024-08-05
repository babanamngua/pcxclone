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
        'user_id',
        'order_id',
        'product_id',
        'review_id',
        'product_name',
        'quantity',
        'color_id',
        'color_name',
        'capacity',
        'size',
        'price',
        ];
        public $timestamps = true; // Đảm bảo timestamps được bật
}
