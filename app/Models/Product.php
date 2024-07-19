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
        'price',
        'description',
        'url_name',
        ];
    public $timestamps = true; // Đảm bảo timestamps được bật
    public function colors()
    {
        return $this->hasMany(Color::class, 'product_id', 'product_id');
    }

    public function quantities()
    {
        return $this->hasMany(Quantity::class, 'product_id', 'product_id');
    }
}
