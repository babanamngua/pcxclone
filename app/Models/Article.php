<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $primaryKey = 'brand_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'articles';
    protected $fillable = [
        'user_id',
        'title',
        'content',
        ];
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
        public function sections()
        {
            return $this->hasMany(Section::class);
        }
    public $timestamps = true; // Đảm bảo timestamps được bật
}
