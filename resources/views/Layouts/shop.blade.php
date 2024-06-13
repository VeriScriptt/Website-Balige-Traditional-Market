@extends('template.master')
@section('master')

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
          <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-12 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                  </div>
                    <div class="mb-4">                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Atur</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                <a class="dropdown-item" href="#" data-sort="relevance">Relevance</a>
                                <a class="dropdown-item" href="#" data-sort="nameAsc">Name, A to Z</a>
                                <a class="dropdown-item" href="#" data-sort="nameDesc">Name, Z to A</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-sort="priceAsc">Price, low to high</a>
                                <a class="dropdown-item" href="#" data-sort="priceDesc">Price, high to low</a>
                            </div>
                        </div>
                    </div>
                
                </div>
              </div>
            </div>
            <div class="row mb-5">
                <div class="row">
                    @foreach ($products as $produk)
                        @if ($produk->stok == 0)
                            @php
                                $produk->is_hidden = true;
                            @endphp
                        @endif
                
                        @if (!$produk->is_hidden)
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
                        @endif
                    @endforeach
                </div>
          </div>

          {{-- PAGENATION --}}
          <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        @if ($products->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        @endif
        
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="page-item @if($products->currentPage() == $i) active @endif">
                                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
        
                        @if ($products->currentPage() < $products->lastPage())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
          </div>
        </div>
        
      </div>
    </div>

@endsection