@extends('template.master')

@section('master')

<style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: #fff;
            font-size: 1.5rem;
            text-align: center;
            padding: 1rem;
        }
        .card-body {
            padding: 2rem;
        }
        .card-body p {
            margin-bottom: 1rem;
        }
        .store-section {
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .store-section:hover {
            transform: translateY(-5px);
        }
        .product-details {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }
        .product-details div {
            flex: 1 1 45%;
            margin: 0.75rem;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.2s;
        }
        .product-details div:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .product-details strong {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
        }
        .img-fluid {
            max-height: 200px;
            display: block;
            margin: 1rem auto;
            border-radius: 5px;
        }
        h5, h6 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        p, li {
            font-size: 1rem;
            line-height: 1.6;
            color: #666;
        }
        .btn-primary {
            background-color: #6e8efb;
            border-color: #6e8efb;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-primary:hover {
            background-color: #5a76d4;
            transform: translateY(-2px);
        }
</style>
<div class="jarak"></div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    Detail Pesanan
                </div>
                <div class="card-body">
                    <p><strong>Nomor Pesanan:</strong> {{ $latestOrder->order_id }}</p>
                    <p><strong>Total Harga:</strong> Rp. {{ number_format($latestOrder->total_price, 0, ',', '.') }}</p>
                    <p><strong>Status:</strong> {{ $latestOrder->status }}</p>
                    <hr>
                    <h5>Produk yang Dipesan:</h5>

                    @foreach($itemsByStore as $storeId => $storeData)
                        <div class="store-section">
                            <h6>Nama Toko: {{ $storeData['store']->nama_toko }}</h6>
                            <p><a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', $storeData['store']->nomor_telepon) }}?text=Halo%20{{ urlencode($storeData['store']->nama_toko) }},%20saya%20{{ urlencode($storeData['store']->owner_name) }}%20ingin%20membeli%20produk%20Anda" class="btn btn-primary" target="_blank">Chat Sekarang</a></p>
                            <h7 contenteditable="true" readonly>Nomor Rekening : 9173981290124</h7>

                            <p>Total Harga: Rp. {{ number_format($storeData['total_price'], 0, ',', '.') }}</p>
                            <div class="product-details">
                                @foreach($storeData['items'] as $item)
                                <div>
                                    <p><strong>Nama Produk:</strong> {{ $item->produk->nama_produk }}</p>
                                    <p><strong>Harga:</strong> Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                                    <p><strong>Jumlah:</strong> {{ $item->quantity }}</p>
                                    <p><strong>Nomor Telepon Toko:</strong> {{ $item->produk->user->nomor_telepon }}</p>
                                </div>
                                
                                @endforeach
                            </div>

                            <!-- Form untuk mengunggah bukti pembayaran per toko -->
                            <form action="{{ route('orders.uploadBuktiTransaksiPerToko', [$latestOrder->order_id, $storeId]) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                                @csrf
                                <div class="form-group">
                                    <label for="bukti_transaksi_{{ $storeId }}">Unggah Bukti Pembayaran untuk {{ $storeData['store']->nama_toko }}</label>
                                    <input type="file" class="form-control-file" name="bukti_transaksi" id="bukti_transaksi_{{ $storeId }}" required>
                                    <span id="file-name-{{ $storeId }}" class="form-text text-muted">
                                        @if($latestOrder->getBuktiTransaksiForStore($storeId))
                                            File saat ini: {{ $latestOrder->getBuktiTransaksiForStore($storeId) }}
                                        @endif
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary">Unggah</button>
                            </form>

                            <!-- Tampilkan bukti pembayaran jika ada -->
                            @if($latestOrder->getBuktiTransaksiForStore($storeId))
                                <hr>
                                <h5>Bukti Pembayaran untuk {{ $storeData['store']->nama_toko }}:</h5>
                                <img src="{{ asset('images/gambar_toko/' . $latestOrder->getBuktiTransaksiForStore($storeId)) }}" alt="Bukti Pembayaran" class="img-fluid">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.onchange = function () {
            var fileName = this.files[0].name;
            document.getElementById('file-name-' + this.id.split('_')[2]).innerText = 'File dipilih: ' + fileName;
        };
    });
</script>
@endsection