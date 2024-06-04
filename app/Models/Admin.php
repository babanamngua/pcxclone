<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $primaryKey = 'admin_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'admin';
    protected $fillable = [
        'user_id',
    ];
}
