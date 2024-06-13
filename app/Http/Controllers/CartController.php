<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Produk;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    // public function index()
    // {
    //     $carts = Cart::with('produk')
    //         ->where('user_id', Auth::id())
    //         ->orderByDesc('created_at')
    //         ->get();
    
    //     $filteredCarts = $carts->filter(function ($cart) {
    //         $product = Produk::where('produk_id', $cart->produk_id)->first();
    //         return $product && $product->is_hidden === 0;
            
    //     });
    //     $cartItemCount = $filteredCarts->count();
    //     return view('layouts.cart', compact('filteredCarts'));
    // }


    public function index()
    {
        // Cek jika ada order dengan status pending
        $pendingOrder = Order::where('user_id', Auth::id())
            ->where('status', 'Pending')
            ->first();

        if ($pendingOrder) {
            // Redirect ke halaman checkout_detail jika ada order pending
            return redirect()->route('checkout.latest', ['orderId' => $pendingOrder->order_id]);
        }

        $carts = Cart::with('produk')
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();
    
        $filteredCarts = $carts->filter(function ($cart) {
            $product = Produk::where('produk_id', $cart->produk_id)->first();
            return $product && $product->is_hidden === 0;
        });
        
        return view('layouts.cart', compact('filteredCarts'));
    }

    public function addToCart(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);
    
        $requestedQuantity = $request->quantity;
    
        // Cek apakah stok yang diminta melebihi stok yang tersedia
        if ($requestedQuantity > $produk->stok) {
            return redirect()->back()->with('error', 'Jumlah yang diminta melebihi stok yang tersedia.');
        }
    
        $cart = Cart::where('user_id', Auth::id())
            ->where('produk_id', $produk->produk_id)
            ->first();
    
        if ($cart) {
            // Jika produk sudah ada di cart
            $newQuantity = $cart->quantity + $requestedQuantity;
    
            // Cek apakah stok yang diminta (jumlah di cart + yang baru) melebihi stok yang tersedia
            if ($newQuantity > $produk->stok) {
                return redirect()->back()->with('error', 'Jumlah yang diminta melebihi stok yang tersedia.');
            }
    
            $cart->quantity = $newQuantity;
            $cart->produk_id = $produk->produk_id; // Tambahkan baris ini
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'produk_id' => $produk->produk_id,
                'nama_produk' => $produk->nama_produk,
                'harga' => $produk->harga,
                'quantity' => $requestedQuantity,
                'gambar_produk' => $produk->gambar_produk,
            ]);
        }
    
        $carts = Cart::with('produk')->where('user_id', Auth::id())->get();
        $filteredCarts = [];
    
        foreach ($carts as $cart) {
            $product = Produk::where('produk_id', $cart->produk_id)->first();
            if ($product && $product->is_hidden === 0) {
                $filteredCarts[] = $cart;
            }
        }
    
        // return view('layouts.cart', compact('filteredCarts'));
        return Redirect::route('cart.index');
    }
    

    public function updateQuantity(Request $request, $cartId)
    {
        $cart = Cart::find($cartId);
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json(['message' => 'Kuantitas diperbarui']);
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    // public function checkout()
    // {
    //     $carts = Cart::where('user_id', Auth::id())->get();
    
    //     if ($carts->isEmpty()) {
    //         return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
    //     }
    
    //     DB::beginTransaction();
    
    //     try {
    //         // Group carts by penjual_id
    //         $groupedCarts = $carts->groupBy(function ($cart) {
    //             return $cart->produk->id_user; // Assuming id_user is the penjual_id
    //         });
    
    //         foreach ($groupedCarts as $penjualId => $carts) {
    //             $order = Order::create([
    //                 'user_id' => Auth::id(),
    //                 'penjual_id' => $penjualId,
    //                 'total_price' => $carts->sum(function ($cart) {
    //                     return $cart->harga * $cart->quantity;
    //                 }),
    //                 'status' => 'Pending'
    //             ]);
    
    //             foreach ($carts as $cart) {
    //                 OrderItem::create([
    //                     'order_id' => $order->order_id,
    //                     'produk_id' => $cart->produk_id,
    //                     'nama_produk' => $cart->nama_produk,
    //                     'harga' => $cart->harga,
    //                     'quantity' => $cart->quantity
    //                 ]);
    //             }
    //         }
    
    //         Cart::where('user_id', Auth::id())->delete();
    
    //         DB::commit();
    
    //         // return redirect()->route('orders.index')->with('success', 'Checkout berhasil, pesanan Anda sedang diproses.');
    //         // return redirect()->route('orders.show', $order->order_id)->with('success', 'Checkout berhasil, pesanan Anda sedang diproses.');
    //         return redirect()->route('checkout.latest', $order->order_id)->with('success', 'Checkout berhasil, pesanan Anda sedang diproses.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->route('cart.index')->with('error', 'Checkout gagal, silakan coba lagi.');
    //     }
    // }

    // public function checkout()
    // {
    //     $carts = Cart::where('user_id', Auth::id())->get();

    //     if ($carts->isEmpty()) {
    //         return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
    //     }

    //     DB::beginTransaction();

    //     try {
    //         $order = Order::create([
    //             'user_id' => Auth::id(),
    //             'total_price' => $carts->sum(function ($cart) {
    //                 return $cart->harga * $cart->quantity;
    //             }),
    //             'status' => 'Pending'
    //         ]);

    //         foreach ($carts as $cart) {
    //             OrderItem::create([
    //                 'order_id' => $order->order_id,
    //                 'produk_id' => $cart->produk_id,
    //                 'nama_produk' => $cart->nama_produk,
    //                 'harga' => $cart->harga,
    //                 'quantity' => $cart->quantity
    //             ]);
    //         }

    //         Cart::where('user_id', Auth::id())->delete();

    //         DB::commit();

    //         return redirect()->route('checkout.latest')->with('success', 'Checkout berhasil, pesanan Anda sedang diproses.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->route('cart.index')->with('error', 'Checkout gagal, silakan coba lagi.');
    //     }
    // }

    // public function checkout()
    // {
    //     $carts = Cart::where('user_id', Auth::id())->get();

    //     if ($carts->isEmpty()) {
    //         return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
    //     }

    //     DB::beginTransaction();

    //     try {
    //         // Create a single order for all items in the cart
    //         $order = Order::create([
    //             'user_id' => Auth::id(),
    //             'total_price' => $carts->sum(function ($cart) {
    //                 return $cart->harga * $cart->quantity;
    //             }),
    //             'status' => 'Pending'
    //         ]);

    //         // Create order items for the order
    //         foreach ($carts as $cart) {
    //             OrderItem::create([
    //                 'order_id' => $order->order_id,
    //                 'produk_id' => $cart->produk_id,
    //                 'nama_produk' => $cart->nama_produk,
    //                 'harga' => $cart->harga,
    //                 'quantity' => $cart->quantity
    //             ]);
    //         }

    //         // Clear the user's cart
    //         Cart::where('user_id', Auth::id())->delete();

    //         DB::commit();

    //         return redirect()->route('checkout.latest')->with('success', 'Checkout berhasil, pesanan Anda sedang diproses.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->route('cart.index')->with('error', 'Checkout gagal, silakan coba lagi.');
    //     }
    // }


    public function checkout()
{
    $carts = Cart::where('user_id', Auth::id())->get();

    if ($carts->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
    }

    DB::beginTransaction();

    try {
        // Check product stock before proceeding with the order
        foreach ($carts as $cart) {
            $produk = Produk::find($cart->produk_id);
            if ($cart->quantity > $produk->stok) {
                DB::rollBack();
                return redirect()->route('cart.index')->with('error', 'Jumlah produk "' . $produk->nama_produk . '" melebihi stok yang tersedia.');
            }
        }

        // Create a single order for all items in the cart
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $carts->sum(function ($cart) {
                return $cart->harga * $cart->quantity;
            }),
            'status' => 'Pending'
        ]);

        // Create order items for the order and update product stock
        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order->order_id,
                'produk_id' => $cart->produk_id,
                'nama_produk' => $cart->nama_produk,
                'harga' => $cart->harga,
                'quantity' => $cart->quantity
            ]);

            $produk = Produk::find($cart->produk_id);
            $produk->stok -= $cart->quantity;
            $produk->save();
        }

        // Clear the user's cart
        Cart::where('user_id', Auth::id())->delete();

        DB::commit();

        return redirect()->route('checkout.latest')->with('success', 'Checkout berhasil, pesanan Anda sedang diproses.');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('cart.index')->with('error', 'Checkout gagal, silakan coba lagi.');
    }
}



    

}
