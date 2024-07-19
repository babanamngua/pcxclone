<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    use HasFactory;
    protected $primaryKey = 'shipping_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'shipping';
    protected $fillable = [
        'order_id',
        'shipping_method_id',
        'shipping_date',
        'shipped_date',
        'status'
        ];
        public $timestamps = false;
}

