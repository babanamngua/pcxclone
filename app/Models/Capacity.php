<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    use HasFactory;
    protected $primaryKey = 'capacity_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'capacity';
    protected $fillable = [
        'product_id',
        'capacity_quantity',
        ];
        public $timestamps = false;
    
}
