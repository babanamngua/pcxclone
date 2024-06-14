<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Order_items;

class CartCountComposer
{
    public function compose(View $view)
    {
        $cartCount = 0;

        if (Auth::check()) {
            $userId = Auth::id();
            $cartCount = Order_items::where('user_id', $userId)->count();
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }

        $view->with('cartCount', $cartCount);
    }
}
