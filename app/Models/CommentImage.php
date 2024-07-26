<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'comment_images';
    protected $fillable = [
        'comment_id',
        'image_url',
        ];

public $timestamps = false; // Đảm bảo timestamps được bật
}
