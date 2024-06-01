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
}
