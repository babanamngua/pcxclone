<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    use HasFactory;
    protected $primaryKey = 'img_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'img';
    protected $fillable = [
        'product_id',
        'url_img',
        ];
}
