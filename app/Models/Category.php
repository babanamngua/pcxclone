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
        'parent_id',
        'group_name',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
public $timestamps = true; // Đảm bảo timestamps được bật
}
