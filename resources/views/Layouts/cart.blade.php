@extends('template.master')
@section('master')
<style>
    body {
        background-color: #f0f2f5;
        font-family: 'Roboto', sans-serif;
    }
    .bg-light {
        background-color: #f8f9fa !important;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table thead th {
        border-bottom: 2px solid #dee2e6;
        background-color: #7971ea;
    }
    .table tbody td {
        border-top: 1px solid #dee2e6;
    }
    .table th, .table td {
        padding: 1rem;
        vertical-align: middle;
        text-align: center;
    }
    .table .product-thumbnail img {
        max-width: 100px;
        margin: auto;
        display: block;
    }
    .quantity-input-container {
        position: relative;
    }
    .quantity-input {
        width: 60px;
        text-align: center;
        padding: 0.375rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }
    .product-remove a {
            color: #fff;
            background-color: #ff6f61;
            border-color: #ff6f61;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            text-decoration: none;
            transition: background-color 0.3s;
        }

    .text-uppercase {
        text-transform: uppercase;
    }
    .border-bottom {
        border-bottom: 2px solid #dee2e6 !important;
    }
    .text-right {
        text-align: right !important;
    }
    .btn-lg {
        font-size: 1.25rem;
        padding: 0.75rem 1.25rem;
    }
    .text-center {
        text-align: center !important;
    }

</style>
      <!-- Tambahkan SweetAlert jika ada pesan kesalahan -->
    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
        });
    </script>
    @endif


    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="/">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Cart</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                                <th class="product-thumbnail" style="color: white;">Image</th>
                                <th class="product-name" style="color: white;">Product</th>
                                <th class="product-price" style="color: white;">Price</th>
                                <th class="product-quantity" style="color: white;">Quantity</th>
                                <th class="product-total" style="color: white;">Total</th>
                                <th class="product-remove" style="color: white;">Remove</th>
                            </tr>
                        </thead>
                        
                            <tbody>
                                @php $total = 0; @endphp

                                @if(count($filteredCarts) > 0)
                                    @foreach($filteredCarts as $item)
                                        @if(!$item->is_hidden)
                                            @php $total += $item->harga * $item->quantity; @endphp
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <img src="{{ asset('images/produk/' . $item->gambar_produk) }}" alt="Image" class="img-fluid">
                                                </td>
                                                <td class="product-name">{{ $item->nama_produk }}</td>
                                                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                                <td>
                                                    <div class="quantity">
                                                        <div class="quantity-input-container" style="display: inline-block;">
                                                            <input type="number" class="quantity-input" value="{{ $item->quantity }}" min="1" onchange="updateQuantity({{ $item->cart_id }}, this.value)">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Rp.{{ number_format($item->harga * $item->quantity, 0, ',', '.') }}</td>
                                                <td class="product-remove">
                                                    <a href="#" onclick="deleteItem({{ $item->cart_id }}); return false;" class="btn btn-primary btn-sm">X</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada produk di keranjang.</td>
                                    </tr>
                                @endif

                                <tr>
                                    <td colspan="4" class="text-right">Total:</td>
                                    <td>Rp.{{ number_format($total, 0, ',', '.') }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">Rp.{{ number_format($total, 0, ',', '.') }}</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">Rp.{{ number_format($total, 0, ',', '.') }}</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('checkout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-lg py-3 btn-block">Checkout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection