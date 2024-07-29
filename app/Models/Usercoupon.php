<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usercoupon extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'usercoupon';
    protected $fillable = [
        'user_id',
        'coupon_id',
        'used'
        ];
        public $timestamps = false;
}
