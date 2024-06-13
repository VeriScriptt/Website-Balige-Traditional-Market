@extends('template.master')
@section('master')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ $penjual->nama_toko }}</strong></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img src="{{ asset('images/gambar_toko/'.$penjual->gambar_toko) }}" alt="Logo Toko" class="img-fluid">
        </div>
        <div class="col-md-3">
            <h2>{{ $penjual->nama_toko }}</h2>
            {{-- <p><i class="fas fa-check-circle text-success"></i> Seller Terpercaya</p> --}}
            <p><i class="fas fa-map-marker-alt"></i> {{ $penjual->lantai_toko }} No. {{ $penjual->nomor_toko }}</p>
            <p><i class="fas fa-user"></i> {{ $penjual->name }}</p>
            <p><i class="fas fa-phone"></i> {{ $penjual->nomor_telepon }}</p>
            <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', $penjual->nomor_telepon) }}?text=Halo%20{{ urlencode($penjual->nama_toko) }},%20saya%20tertarik%20dengan%20produk%20Anda." class="btn btn-primary" target="_blank">Chat Sekarang</a>
        </div>
        
    
    <hr>
    
        {{-- <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user"></i> Terakhir Online</h5>
                    <p class="card-text">13 jam lalu</p>
                </div>
            </div>
        </div> --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-box"></i> Jumlah produk</h5>
                    <p class="card-text">{{ $produks->count() }}</p>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-star"></i> Penilaian</h5>
                    <p class="card-text">4.8</p> <!-- Placeholder, Anda bisa menggantinya dengan data nyata -->
                </div>
            </div>
        </div> --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-calendar-alt"></i> Bergabung</h5>
                    <p class="card-text">{{ $penjual->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h3>Produk</h3>

    <div class="d-flex mb-4">
        <div class="dropdown mr-1 ml-md-auto">
            <div class="btn-group float-right">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Atur</button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">Relevance</a>
                    <a class="dropdown-item" href="#">Name, A to Z</a>
                    <a class="dropdown-item" href="#">Name, Z to A</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Price, low to high</a>
                    <a class="dropdown-item" href="#">Price, high to low</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($produks as $produk)
        <div class="col-md-4 col-sm-6 col-lg-3 mb-4">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 0.5rem; overflow: hidden;">
                <a class="card-img-tiles" href="/shop_detail/{{ $produk->produk_id }}" data-abc="true">
                    <div class="inner">
                        <div class="main-img position-relative">
                            <img src="{{ asset('images/produk/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;">
                        </div>
                    </div>
                </a>
                <div class="card-body text-center d-flex flex-column justify-content-between" style="padding: 1rem;">
                    <div class="d-flex flex-column align-items-center">
                        <h5 class="card-title font-weight-bold mb-2" style="font-size: 1.1rem; text-align: center;">{{ $produk->nama_produk }}</h5>
                        <p class="text-muted mb-3" style="font-size: 1rem; color: #555;">{{ $produk->deskripsi }}</p>
                    </div>
                    <a class="btn btn-outline-primary btn-sm mt-auto" href="/shop_detail/{{ $produk->produk_id }}" data-abc="true" style="border-radius: 20px;">Lihat Produk</a>
                </div>
            </div>
        </div>
    @endforeach

    </div>
    <div class="row" data-aos="fade-up">
        <div class="col-md-12 text-center">
          <a href="{{route('shop.index')  }}" class="btn btn-primary btn-lg">Lihat Lainnya</a>
        </div>
      </div>

    {{-- <div class="row">
        <div class="col-md-12 text-center">
            <a href="{{ route('shop') }}" class="btn btn-primary">Lihat Lainnya</a>
        </div>
    </div> --}}
</div>
@endsection