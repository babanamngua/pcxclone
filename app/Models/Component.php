<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    protected $primaryKey = 'component_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'component';
    protected $fillable = [
        'component_name',
        ];
        public function category()
        {
            return $this->hasMany(Category::class);
        }
public $timestamps = true; // Đảm bảo timestamps được bật
}
