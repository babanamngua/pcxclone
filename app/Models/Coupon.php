<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'coupon';
    protected $fillable = [
        'code',
        'description',
        'discount_id',
        'expiry_date',
        'quantity',
        'remaining_quantity'
        ];
        public $timestamps = false;
}
