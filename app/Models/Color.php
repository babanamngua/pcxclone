<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $primaryKey = 'color_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'color';
    protected $fillable = [
        'product_id',
        'color_name',
        'color_code'
        ];
        public $timestamps = true; // Đảm bảo timestamps được bật
        public function product()
        {
            return $this->belongsTo(Product::class, 'product_id', 'product_id');
        }
    
        public function quantities()
        {
            return $this->hasMany(Quantity::class, 'color_id', 'color_id');
        }
}
