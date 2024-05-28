<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'category_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'category';
    protected $fillable = [
        'category_name',
        'url_name',
        'brand_id',
        'component_id'
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

public $timestamps = true; // Đảm bảo timestamps được bật
}
