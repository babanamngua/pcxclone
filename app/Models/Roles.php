<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $primaryKey = 'role_id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'roles';
    protected $fillable = [
        'role_name',
        'description',
    ];
    public $timestamps = false;
}
