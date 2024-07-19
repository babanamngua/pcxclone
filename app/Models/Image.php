<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'images';
    protected $fillable = [
        'path',
        'caption',
        ];
        public function section()
        {
            return $this->belongsTo(Section::class);
        }
    public $timestamps = true; // Đảm bảo timestamps được bật   
}
