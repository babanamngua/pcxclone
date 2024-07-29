<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayMethods extends Model
{
    use HasFactory;
    protected $primaryKey = 'pay_methods_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'pay_methods';
    protected $fillable = [
        'method_name',
        ];
        public $timestamps = false;
}
