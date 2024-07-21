<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'sections';
    protected $fillable = [
        'article_id',
        'content1',
        'content2',
        'url_img',
        ];
        public function article()
        {
            return $this->belongsTo(Article::class);
        }
    public $timestamps = false; // Đảm bảo timestamps được tắt
}
