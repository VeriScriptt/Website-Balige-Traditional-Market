<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail Pesanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Pesanan</h1>
        <div class="card">
            <div class="card-header">
                Detail Pesanan
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama Pembeli: {{ $order->user->name }}</h5>
                <p class="card-text">Email: {{ $order->user->email }}</p>
                <p class="card-text">Nomor HP: {{ $order->user->phone }}</p>
                <p class="card-text">Status: {{ $order->status }}</p>
                <h6>Produk Pesanan:</h6>
                <ul>
                    @php
                        $totalHarga = 0;
                    @endphp
                    @foreach($order->orderItems as $item)
                        @if($item->produk->id_user == Auth::id())
                            <li>{{ $item->produk->nama_produk }} - {{ $item->quantity }} pcs</li>
                            @php
                                $totalHarga += $item->harga * $item->quantity;
                            @endphp
                        @endif
                    @endforeach
                </ul>
                <p class="card-text">Total Harga: Rp.{{ number_format($totalHarga, 0, ',', '.') }}</p>
                <form action="{{ route('orders.updateStatus', $order->order_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="status">Ubah Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Pompleted" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-2">Kembali</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
