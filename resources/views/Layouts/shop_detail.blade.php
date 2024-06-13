@extends('template.master')

@section('master')
<style>
    .site-section {
      background-color: #f8f9fa;
      padding: 30px 0;
    }

    .border-custom {
      border: 1px solid #dee2e6;
      border-radius: 10px;
    }

    .badge-custom {
      background-color: #6c757d;
      color: white;
    }

    .btn-custom {
      border: none;
    }

    .form-control-custom {
      border-radius: 5px;
    }

    .comment-box {
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 20px;
    }

    .comment-header {
      border-bottom: 1px solid #dee2e6;
      margin-bottom: 10px;
      padding-bottom: 10px;
    }

    .comment-text {
      color: #6c757d;
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
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-2 mb-0">/</span>
        <strong class="text-black">{{ $produk->nama_produk }}</strong>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <img src="{{ asset('images/produk/' . $produk->gambar_produk) }}" alt="Image" class="img-fluid shadow-lg rounded" style="max-height: 400px;">
      </div>
      <div class="col-lg-6">
        <h2 class="text-primary mb-4" style="font-size: 28px; font-weight: bold;">{{ $produk->nama_produk }}</h2>
        <p class="text-muted mb-4" style="font-size: 18px;">{{ $produk->deskripsi }}</p>
        <div class="d-flex justify-content-between align-items-center mb-4">
          <p class="mb-0" style="font-size: 18px;">Stok: {{ $produk->stok }}</p>
          <p class="mb-0"><strong class="text-primary h4">Rp.{{ $produk->harga }}</strong></p>
        </div>
        <form action="{{ route('cart.add') }}" method="POST">
          @csrf
          <input type="hidden" name="produk_id" value="{{ $produk->produk_id }}">
          <div class="input-group mb-3">
            <input type="number" name="quantity" class="form-control" value="1" min="1" style="font-size: 18px;">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary px-4 py-2" style="font-size: 18px;">Tambah ke Keranjang</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-6">
          <div class="border-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h4 class="text-black mb-0">Ulasan</h4>
              <h6><span class="badge badge-custom">{{ $ulasan->count() }} Ulasan</span></h6>
            </div>

            @if ($ulasan->isNotEmpty())
              @foreach ($ulasan as $item)
                <div class="comment-box mb-4">
                  <div class="comment-header d-flex align-items-center mb-2">
                    <h6 class="mb-0 font-weight-bold">{{ $item->name }}</h6>
                    <p class="text-muted ml-auto"><small>{{ $item->created_at->format('d M Y, H:i') }}</small></p>
                  </div>
                  <p class="comment-text mb-0">{{ $item->comment }}</p>
                </div>
              @endforeach
            @else
              <div class="alert alert-info text-sm">Belum ada ulasan untuk produk ini.</div>
            @endif

            @if (auth()->check() && auth()->user()->role == 'pembeli')
              <div class="border-custom p-4 mb-4">
                <h5 class="mb-3 font-weight-bold">Tulis Ulasan</h5>
                <form action="{{ route('ulasan.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="produk_id" value="{{ $produk->produk_id }}">
                  <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-custom text-sm" id="name" name="name" value="{{ auth()->user()->name }}" placeholder="Nama" required>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control form-control-custom text-sm" id="comment" name="comment" rows="3" placeholder="Ulasan" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">Kirim Ulasan</button>
                </form>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- Profil Toko --}}
<div class="store-profile">
  <div class="store-details">
    <div class="store-image">
      <img src="{{ asset('images/gambar_toko/'.$penjual->gambar_toko) }}" alt="Store Logo" class="img-fluid">
    </div>
      <div class="store-info">
        <h4>{{ $penjual->nama_toko }}</h4> <!-- Tampilkan nama toko -->
        <p>{{ $penjual->lantai_toko }}</p> <!-- Tampilkan lantai toko -->
        <div class="store-badges">
          <span class="badge badge-primary">{{ $penjual->nomor_telepon }}</span> <!-- Tampilkan peran penjual -->
        </div>
      </div>

    </div>
  <div class="store-actions">
    <a href="{{ route('toko.show', $penjual->user_id) }}" class="btn btn-sm btn-outline-primary">Kunjungi Toko</a>
    <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', $penjual->nomor_telepon) }}?text=Halo%20{{ urlencode($penjual->nama_toko) }},%20saya%20tertarik%20dengan%20produk%20Anda." class="btn btn-primary" target="_blank">Chat Sekarang</a>
  </div>
</div>

{{-- Other Products --}}
<div class="site-section block-3 site-blocks-2 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 site-section-heading text-center pt-4 mb-5">
        <h2>Other Products</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        {{-- <div class="row">
          @foreach ($otherProducts as $produk)
          <div class="col-md-3 col-sm-6 col-lg-3 mb-4">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 0.5rem; overflow: hidden;">
              <a class="card-img-tiles" href="shop_detail/{{$produk->produk_id}}" data-abc="true">
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
                <a class="btn btn-outline-primary btn-sm mt-auto" href="{{$produk->produk_id}}" data-abc="true" style="border-radius: 20px;">View Products</a>
              </div>
            </div>
          </div>
          @endforeach
        </div> --}}
        <div class="row">
          @foreach ($otherProducts as $produk)
              @if ($produk->stok == 0)
                  @php
                      $produk->is_hidden = true;
                  @endphp
              @endif
      
              @if (!$produk->is_hidden)
                  <div class="col-md-3 col-sm-6 col-lg-3 mb-4">
                      <div class="card h-100 border-0 shadow-sm" style="border-radius: 0.5rem; overflow: hidden;">
                          <a class="card-img-tiles" href="shop_detail/{{ $produk->produk_id }}" data-abc="true">
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
                              <a class="btn btn-outline-primary btn-sm mt-auto" href="{{ $produk->produk_id }}" data-abc="true" style="border-radius: 20px;">View Products</a>
                          </div>
                      </div>
                  </div>
              @endif
          @endforeach
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <a href="{{ route('shop.index') }}" class="btn btn-primary">Lihat Lainnya</a>
      </div>
    </div>
  </div>
</div>
@endsection