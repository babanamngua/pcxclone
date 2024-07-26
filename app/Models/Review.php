<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'review';
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
        ];
    public $timestamps = true; // Đảm bảo timestamps được tắt
}
