<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'return_items';
    protected $fillable = [
        'order_id',
        'order_item_id',
        'product_id',
        'quantity',
        'new',
        'exchange_order_item_id',
        'exchange_quantity',
        ];
        public $timestamps = true; // Đảm bảo timestamps được tắt
}
