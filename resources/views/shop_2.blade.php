@extends('template.master')
@section('master')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-9 order-2">

                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                            <div class="d-flex">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Atur</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item" href="{{ route('shop.index', ['sortBy' => 'relevance']) }}">Relevance</a>
                                        <a class="dropdown-item" href="{{ route('shop.index', ['sortBy' => 'nameAsc']) }}">Name, A to Z</a>
                                        <a class="dropdown-item" href="{{ route('shop.index', ['sortBy' => 'nameDesc']) }}">Name, Z to A</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('shop.index', ['sortBy' => 'priceAsc']) }}">Price, low to high</a>
                                        <a class="dropdown-item" href="{{ route('shop.index', ['sortBy' => 'priceDesc']) }}">Price, high to low</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="row">
                            @foreach ($products as $produk)
                            <div class="col-md-3 col-sm-6 col-lg-3 mb-4">
                                <div class="card h-100 border-0 shadow-sm" style="border-radius: 0.5rem; overflow: hidden;">
                                    <a class="card-img-tiles" href="{{ route('shop_detail', $produk->produk_id) }}" data-abc="true">
                                        <div class="inner">
                                            <div class="main-img position-relative">
                                                <img src="{{ asset('images/produk/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;">
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body text-center d-flex flex-column justify-content-between" style="padding: 1rem;">
                                        <div class="d-flex flex-column align-items-center">
                                            <h5 class="card-title font-weight-bold mb-2" style="font-size: 1.1rem; text-align: center;">{{ $produk->nama_produk }}</h5>
                                            <p class="text-muted mb-3" style="font-size: 1rem; color: #555;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                            <p class="card-text">Stok: {{ $produk->stok }}</p>
                                        </div>
                                        <a class="btn btn-outline-primary btn-sm mt-auto" href="{{ route('shop_detail', $produk->produk_id) }}" data-abc="true" style="border-radius: 20px;">View Products</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center">
                            <div class="site-block-27">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">

                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                            <div id="slider-range" class="border-primary"></div>
                            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection