<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'discount';
    protected $fillable = [
        'description',
        'value',
        'start_date',
        'end_date'
        ];
        public $timestamps = true;
}
