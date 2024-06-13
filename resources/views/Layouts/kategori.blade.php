@extends('template.master')
@section('master')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="/">Home</a>
                <span class="mx-2 mb-0">/</span>
                <strong class="text-black">{{ $kategori->nama_kategori }}</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 order-2">
                @if (session('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @else
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4">
                            <h2 class="text-black h5">{{ $kategori->nama_kategori }}</h2>
                        </div>
                        {{-- <div class="d-flex">
                            <div class="dropdown mr-1 ml-md-auto">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Urutkan
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item {{ $sortBy == 'relevance' ? 'active' : '' }}" href="#" data-sort="relevance">Relevance</a>
                                    <a class="dropdown-item {{ $sortBy == 'nameAsc' ? 'active' : '' }}" href="#" data-sort="nameAsc">Name, A to Z</a>
                                    <a class="dropdown-item {{ $sortBy == 'nameDesc' ? 'active' : '' }}" href="#" data-sort="nameDesc">Name, Z to A</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item {{ $sortBy == 'priceAsc' ? 'active' : '' }}" href="#" data-sort="priceAsc">Price, low to high</a>
                                    <a class="dropdown-item {{ $sortBy == 'priceDesc' ? 'active' : '' }}" href="#" data-sort="priceDesc">Price, high to low</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="row">
                        @foreach ($products as $produk)
                        <div class="col-md-3 col-sm-6 col-lg-2 mb-4">
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
                @endif
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            let sortBy = this.dataset.sort;
            let url = new URL(window.location.href);
            url.searchParams.set('sort', sortBy);
            window.location.href = url.toString();
        });
    });
</script>
@endsection