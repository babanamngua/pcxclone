<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethods extends Model
{
    use HasFactory;
    protected $primaryKey = 'shipping_methods_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'shipping_methods';
    protected $fillable = [
        'method_name',
        ];
        public $timestamps = false;
}
