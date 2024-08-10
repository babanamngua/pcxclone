<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VNpayment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Tên cột khóa chính của bạn là 'brand_id'
    protected $table = 'vnpayment';

    // Danh sách các thuộc tính có thể gán đại trà (mass assignable)
    protected $fillable = [
        'vnp_Amount',
        'vnp_BankCode',
        'vnp_BankTranNo',
        'vnp_CardType',
        'vnp_OrderInfo',
        'vnp_PayDate',
        'vnp_ResponseCode',
        'vnp_TmnCode',
        'vnp_TransactionNo',
        'vnp_TransactionStatus',
        'vnp_TxnRef',
        'vnp_SecureHash',
    ];
    public $timestamps = true; // Đảm bảo timestamps được bật
}
