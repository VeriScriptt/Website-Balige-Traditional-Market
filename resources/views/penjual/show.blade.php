@extends('template.master')

@section('master')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail Pesanan</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pesanan</h6><hr>
        <div class="card-body">
            <p><strong>Nama Pemesan:</strong> {{ $order->user->name }}</p>
            <p><strong>Total Harga:</strong> Rp.{{ number_format($order->total_price, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <h5>Produk Pesanan:</h5>
            <ul>
                @foreach($order->orderItems as $item)
                <li>{{ $item->nama_produk }} ({{ $item->quantity }})</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
