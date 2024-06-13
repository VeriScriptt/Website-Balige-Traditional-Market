<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartComposer
{
    public function compose(View $view)
    {
        if (Auth::check()) {
            $carts = Cart::with('produk')
                ->where('user_id', Auth::id())
                ->orderByDesc('created_at')
                ->get();
    
            $filteredCarts = $carts->filter(function ($cart) {
                $product = $cart->produk; // Eager loaded, tidak perlu query lagi
                return $product && $product->is_hidden === 0;
            });
    
            $cartItemCount = $filteredCarts->count('produk_id'); // Menghitung total quantity
        } else {
            $cartItemCount = 0;
        }
        
        $view->with('cartItemCount', $cartItemCount);
    }
}
