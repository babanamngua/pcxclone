<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'quantity_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'quantity';
    protected $fillable = [
        'product_id',
        'color_id',
        'quantity_product',
        'discount_id',
        'capacity',
        'size',
        'price',

        ];
        public $timestamps = false;
        public function product()
        {
            return $this->belongsTo(Product::class, 'product_id', 'product_id');
        }
    
        public function color()
        {
            return $this->belongsTo(Color::class, 'color_id', 'color_id');
        }
}
