<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'product';
    protected $fillable = [
        'product_name',
        'category_id',
        'brand_id',
        'img_id',
        'color_id',
        'price',
        'description',
        'quantity',
        ];
    public $timestamps = true; // Đảm bảo timestamps được bật
}
