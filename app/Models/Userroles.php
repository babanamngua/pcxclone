<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userroles extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_role_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'brand';
    protected $fillable = [
        'user_id',
        'role_id',
        'assigned_by',
        ];
    public $timestamps = true; // Đảm bảo timestamps được bật
}
