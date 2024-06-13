@extends('template.master')

@section('master')
<style>
/* Custom CSS to enhance table appearance */
.custom-table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 1.5rem;
    font-size: 1rem;
}

.custom-table th, .custom-table td {
    border: 1px solid #dee2e6;
    padding: 1rem;
}

.custom-table th {
    background-color: #7971ea;
    color: #fff;
    text-align: center;
}

.custom-table td {
    text-align: center;
}

.custom-table tbody tr:nth-child(odd) {
    background-color: #f8f9fa;
}

.custom-table tbody tr:hover {
    background-color: #e9ecef;
}

.custom-table .text-right {
    text-align: right;
}

/* Additional CSS for better styling */
.bg-light-custom {
    background-color: #f7f7f7;
}

.site-section-custom {
    padding: 2rem 0;
}

.table-responsive-custom {
    overflow-x: auto;
}

.table-container {
    border: 1px solid #dee2e6;
    padding: 1.5rem;
    border-radius: 5px;
    background-color: #fff;
}



.text-muted-custom {
    color: #6c757d;
}
</style>

<div class="bg-light-custom py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <nav class="breadcrumb-custom">
                    <a href="/" class="text-black">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Riwayat Pembelian</strong>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-section-custom">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="h3 mb-3 heading-custom">Riwayat Pembelian Anda</h2>
                <div class="table-container">
                    @if($orders->isEmpty())
                        <p class="text-muted-custom">Anda belum pernah membeli apa apa</p>
                    @else
                        <div class="table-responsive table-responsive-custom">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Item</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                            <td>{{ ucfirst($order->status) }}</td>
                                            <td class="text-right">Rp.{{ number_format($order->total_price, 0, ',', '.') }}</td>
                                            <td>
                                                <ul class="list-unstyled">
                                                    @foreach($order->orderItems as $item)
                                                        <li>{{ $item->nama_produk }} - {{ $item->quantity }} pcs</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection