<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // public function index()
    // {
    //     $orders = Order::with('orderItems.produk')
    //         ->whereHas('orderItems.produk', function ($query) {
    //             $query->where('id_user', Auth::id());
    //         })
    //         ->orderByDesc('created_at')
    //         ->get();
    
    //     // dd($orders); // Debugging line
    
    //     return view('penjual.pesanan', compact('orders'));
    // }
    // public function index()
    // {
    //     $orders = Order::whereHas('orderItems.produk', function ($query) {
    //         $query->where('id_user', Auth::id());
    //     })
    //     ->with(['orderItems' => function ($query) {
    //         $query->whereHas('produk', function ($query) {
    //             $query->where('id_user', Auth::id());
    //         });
    //     }, 'orderItems.produk', 'user'])
    //     ->orderByDesc('created_at')
    //     ->get();
    
    //     return view('penjual.pesanan', compact('orders'));
    // }

    public function index()
    {
        $pendingOrders = Order::whereHas('orderItems.produk', function ($query) {
                $query->where('id_user', Auth::id());
            })
            ->where('status', 'Pending')
            ->with(['orderItems' => function ($query) {
                $query->whereHas('produk', function ($query) {
                    $query->where('id_user', Auth::id());
                });
            }, 'orderItems.produk', 'user'])
            ->orderByDesc('created_at')
            ->paginate(5, ['*'], 'pendingPage');
    
        $orders = Order::whereHas('orderItems.produk', function ($query) {
                $query->where('id_user', Auth::id());
            })
            ->where('status', '!=', 'Pending')
            ->with(['orderItems' => function ($query) {
                $query->whereHas('produk', function ($query) {
                    $query->where('id_user', Auth::id());
                });
            }, 'orderItems.produk', 'user'])
            ->orderByDesc('created_at')
            ->paginate(5, ['*'], 'ordersPage');
    
        return view('penjual.pesanan', compact('orders', 'pendingOrders'));
    }
    

    

    public function showDetail($id)
    {
        $order = Order::with(['orderItems' => function ($query) {
                $query->whereHas('produk', function ($query) {
                    $query->where('id_user', Auth::id());
                });
            }, 'orderItems.produk', 'user'])
            ->findOrFail($id);
    
        return view('penjual.pesanan_detail', compact('order'));
    }
    

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Status pesanan berhasil diperbarui');
    }

    // public function showPembeli(Order $order)
    // {
    //     $orderItems = $order->orderItems;
    //     return view('layouts.checkout', compact('order', 'orderItems'));
    // }



    // public function show(Order $order)
    // {
    //     $orderDetails = OrderDetail::where('order_id', $order->id)->get();

    //     if ($orderDetails->isEmpty()) {
    //         dd('Order details not found', $orderDetails);
    //     }

    //     return view('layouts.checkout_detail', compact('order', 'orderDetails'));
    // }


    // public function showLatestOrder()
    // {
    //     $latestOrder = Order::where('user_id', auth()->id())
    //                         ->latest()
    //                         ->first();

    //     if ($latestOrder) {
    //         // Pesanan terakhir ditemukan, kirim ke tampilan untuk ditampilkan
    //         return view('layouts.checkout_detail', compact('latestOrder'));
    //     } else {
    //         // Pesanan terakhir tidak ditemukan
    //         return redirect()->route('home')->with('error', 'Pesanan tidak ditemukan.');
    //     }
    // }

    // public function showLatestOrder()
    // {
    //     $latestOrder = Order::where('user_id', auth()->id())
    //                         ->latest()
    //                         // ->with('orderItems') // Load order items with related produk
    //                         ->first();

    //     if ($latestOrder) {
    //         // Pesanan terakhir ditemukan, kirim ke tampilan untuk ditampilkan
    //         return view('layouts.checkout_detail', compact('latestOrder'));
    //     } else {
    //         // Pesanan terakhir tidak ditemukan
    //         return redirect()->route('home')->with('error', 'Pesanan tidak ditemukan.');
    //     }
    // }

    // public function uploadBuktiTransaksi(Request $request, $id)
    // {
    //     $request->validate([
    //         'bukti_transaksi' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
    //     ]);
    
    //     $order = Order::findOrFail($id);
    
    //     if ($request->hasFile('bukti_transaksi')) {
    //         $image = $request->file('bukti_transaksi');
    //         $name = time().'.'.$image->getClientOriginalExtension();
    //         $destinationPath = public_path('images/gambar_toko');  // Sama dengan lokasi 'gambar_toko'
    
    //         if (!file_exists($destinationPath)) {
    //             mkdir($destinationPath, 0755, true);
    //         }
    
    //         $image->move($destinationPath, $name);
    //         Log::info('Bukti transaksi diunggah: ' . $name);
    //         $order->bukti_transaksi = $name;

    //         // Update the order status to "Completed"
    //         $order->status = 'Completed';

    //     } else {
    //         Log::error('File bukti transaksi tidak ditemukan.');
    //     }
    
    //     $order->save();
    //     Log::info('Order diperbarui dengan bukti transaksi.');
    
    //     return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah.');
    // }

    // OrderController.php
// OrderController.php
// OrderController.php
public function showLatestOrder()
{
    $latestOrder = Order::where('user_id', auth()->id())
                        ->latest()
                        ->with('orderItems.produk.user') // Load order items with related produk and user (as store owner)
                        ->first();

    if ($latestOrder) {
        // Mengelompokkan item berdasarkan toko
        $itemsByStore = [];
        foreach ($latestOrder->orderItems as $item) {
            $storeId = $item->produk->user->user_id; // Asumsikan produk memiliki user_id sebagai store owner
            if (!isset($itemsByStore[$storeId])) {
                $itemsByStore[$storeId] = [
                    'store' => $item->produk->user,
                    'total_price' => 0,
                    'items' => []
                ];
            }
            $itemsByStore[$storeId]['items'][] = $item;
            $itemsByStore[$storeId]['total_price'] += $item->harga * $item->quantity;
        }

        // Pesanan terakhir ditemukan, kirim ke tampilan untuk ditampilkan
        return view('layouts.checkout_detail', compact('latestOrder', 'itemsByStore'));
    } else {
        // Pesanan terakhir tidak ditemukan
        return redirect()->route('home')->with('error', 'Pesanan tidak ditemukan.');
    }
}


// OrderController.php
// public function uploadBuktiTransaksiPerToko(Request $request, $orderId, $storeId)
// {
//     $request->validate([
//         'bukti_transaksi' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
//     ]);

//     $order = Order::findOrFail($orderId);

//     if ($request->hasFile('bukti_transaksi')) {
//         $image = $request->file('bukti_transaksi');
//         $name = time() . '_' . $image->getClientOriginalName();
//         $destinationPath = public_path('images/gambar_toko/');

//         if (!file_exists($destinationPath)) {
//             mkdir($destinationPath, 0755, true);
//         }

//         $image->move($destinationPath, $name);
//         $order->setBuktiTransaksiForStore($storeId, $name);
//     }

//     return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah.');
// }

public function uploadBuktiTransaksiPerToko(Request $request, $orderId, $storeId)
{
    $request->validate([
        'bukti_transaksi' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
    ]);

    $order = Order::findOrFail($orderId);

    if ($request->hasFile('bukti_transaksi')) {
        $image = $request->file('bukti_transaksi');
        $name = time() . '_' . $image->getClientOriginalName();
        $destinationPath = public_path('images/gambar_toko/');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $image->move($destinationPath, $name);
        $order->setBuktiTransaksiForStore($storeId, $name);
    }

    // Periksa apakah semua toko sudah memiliki bukti pembayaran
    $allStoresCompleted = true;
    $orderItems = $order->orderItems;
    $storeIds = $orderItems->map(function ($item) {
        return $item->produk->user->user_id;
    })->unique();

    foreach ($storeIds as $id) {
        if (!$order->getBuktiTransaksiForStore($id)) {
            $allStoresCompleted = false;
            break;
        }
    }

    if ($allStoresCompleted) {
        $order->status = 'Completed';
        $order->save();
    }

    return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah.');
}







    public function history()
    {
        // Get all orders for the authenticated user
        $orders = Order::where('user_id', Auth::id())->with('orderItems.produk')->orderByDesc('created_at')->get();

        // Return the view with orders data
        return view('layouts.history', compact('orders'));
    }


}


