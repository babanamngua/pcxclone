<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
      use HasFactory;
    protected $primaryKey = 'brand_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'brand';
    protected $fillable = [
        'category_id',
        'brand_name',
        'url_name',
        ];
        public function category()
        {
            return $this->hasMany(Category::class);
        }
public $timestamps = true; // Đảm bảo timestamps được bật
}
