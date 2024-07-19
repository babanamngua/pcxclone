<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Transaction;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }

    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $token = $request->stripeToken;

        try {
            $charge = Charge::create([
                'amount' => 1000, // số tiền cần thanh toán, tính bằng cent (10.00 USD)
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $token,
            ]);
            // Kiểm tra xem người dùng có đăng nhập hay không
            $userId = auth()->check() ? auth()->id() : null;
            // Lưu thông tin giao dịch vào database
            Transaction::create([
                'user_id' => $userId, // có thể null nếu không đăng nhập
                'transaction_id' => $charge->id,
                'amount' => $charge->amount,
                'currency' => $charge->currency,
                'status' => $charge->status,
            ]);

            return redirect()->route('payment.index')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return redirect()->route('payment.index')->with('error', 'Payment failed!');
        }
    }
}
