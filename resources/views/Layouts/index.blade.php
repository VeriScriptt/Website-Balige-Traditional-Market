@extends('template.master')
@section('master')

{{-- <style>
.site-wrap {
    padding-top: 60px !important; /* Ganti 100px dengan tinggi navbar Anda */
}
/* body {
    background-color: #eee;
} */

/* .mt-100 {
    margin-top: 100px;
} */

.card {
    border-radius: 7px !important;
    border-color: #e1e7ec;
    max-width: 300px; /* Set maximum width for cards */
    max-height: 400px; /* Set maximum height for cards */
    margin: 0 auto; /* Center align the card if it has a max-width */
}

.mb-30 {
    margin-bottom: 30px !important;
}

.card-img-tiles {
    display: block;
    border-bottom: 1px solid #e1e7ec;
}

a {
    color: #0da9ef;
    text-decoration: none !important;
}

.card-img-tiles>.inner {
    display: table;
    width: 100%;
}

.card-img-tiles .main-img, .card-img-tiles .thumblist {
    display: table-cell;
    width: 65%;
    padding: 15px;
    vertical-align: middle;
}

.card-img-tiles .main-img>img:last-child, .card-img-tiles .thumblist>img:last-child {
    margin-bottom: 0;
}

.card-img-tiles .main-img>img, .card-img-tiles .thumblist>img {
    display: block;
    width: 100%;
    margin-bottom: 6px;
    max-height: 200px; /* Set maximum height for images */
    object-fit: cover; /* Ensures the image covers the container without distortion */
}

.thumblist {
    width: 35%;
    border-left: 1px solid #e1e7ec !important;
    display: table-cell;
    width: 65%;
    padding: 15px;
    vertical-align: middle;
}

.card-img-tiles .thumblist>img {
    display: block;
    width: 100%;
    margin-bottom: 6px;
    max-height: 200px; /* Set maximum height for images */
    object-fit: cover; /* Ensures the image covers the container without distortion */
}

.btn-group-sm>.btn, .btn-sm {
    padding: .45rem .5rem !important;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}

/* Custom CSS for 5 columns */
.col-lg-2_4 {
    flex: 0 0 20%;
    max-width: 20%;
}
@media (max-width: 1200px) {
    .col-lg-2_4 {
        flex: 0 0 25%;
        max-width: 25%;
    }
}
@media (max-width: 992px) {
    .col-lg-2_4 {
        flex: 0 0 33.3333%;
        max-width: 33.3333%;
    }
}
@media (max-width: 768px) {
    .col-lg-2_4 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}
@media (max-width: 576px) {
    .col-lg-2_4 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}
.swiper-container {
    width: 100%;
    overflow: hidden;
    padding-top: 10px;
    padding-bottom: 20px;
    max-height: 110px;
}

.swiper-wrapper {
    display: flex;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    justify-content: center;
    align-items: center;
}

.kategori-item {
    width: 100px;
    text-align: center;
}

.kategori-title {
    font-size: 14px;
    margin-top: 10px;
}

.swiper-pagination {
    margin-top: 10px; /* Reduce the space between categories and pagination */
}

.swiper-button-next,
.swiper-button-prev {
    color: black;
    top: 80%; /* Position the buttons vertically in the middle */
    color: #757575; /* Warna abu-abu */
    font-size: 10px; /* Ukuran font */
    width: 40px; /* Lebar tombol */
    height: 40px; /* Tinggi tombol */
    line-height: 40px; /* Ketinggian garis teks */
    background-color: transparent; /* Agar latar belakangnya transparan */
    opacity: 0.7; /* Ketransparanan */
}

.swiper-button-next {
    right: 10%; /* Position the next button on the right side */
}

.swiper-button-prev {
    left: 10%; /* Position the prev button on the left side */
}

@media (max-width: 768px) {
    .swiper-slide {
        width: auto;
    }

    .kategori-item {
        width: 80px;
    }

    .kategori-title {
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .kategori-item {
        width: 60px;
    }

    .kategori-title {
        font-size: 10px;
    }
}
   /* Sembunyikan bullet list */
   #store-list {
        list-style: none;
        padding: 0;
    }

    #store-list {
        list-style: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Untuk menjaga jarak antara elemen pada baris */
    }

    .store {
        width: 100%; /* Agar 2 item bisa muat dalam 1 baris */
        margin-bottom: 10px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f8f9fa;
    }
     /* Style untuk tombol floor */
     .floor-button {
            margin: 5px;
            padding: 10px 20px;
            border-radius: 15px;
            font-size: 16px;
            font-weight: bold;
            text-align: center; /* Menengahkan teks tombol */
        }

        /* Style untuk tombol floor saat dihover */
        .floor-button:hover {
            background-color: #7971ea; /* Warna background saat dihover */
        }

        /* Style untuk tombol floor saat diaktifkan */
        /* Style for active floor button */
        .floor-button.active {
            background-color: white; /* Set the background color to white */
            color: #7971ea; /* Set the text color */
            border-color: #7971ea; /* Set the border color */
        }


        #floor-buttons {
            text-align: center !important;
        }
        /* Style untuk tabel toko */
        .store-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;

        }

        /* Style untuk header tabel */
        .store-table thead {
            background-color: #7971ea; /* Warna latar belakang header */
            color: #fff; /* Warna teks header */
        }

        /* Style untuk sel header */
        .store-table th {
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #ddd; /* Garis bawah */
        }

        /* Style untuk sel data */
        .store-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd; /* Garis bawah */
        }

        /* Style untuk baris ganjil */
        .store-table tbody tr:nth-child(odd) {
            background-color: #f2f2f2; /* Warna latar belakang ganjil */
        }
        /* Style untuk tombol floor */
        .floor-button {
            margin: 5px;
            padding: 10px 20px;
            border-radius: 15px;
            font-size: 16px;
            font-weight: bold;
            text-align: center; /* Menengahkan teks tombol */
        }


        /* Mengatur div floor-buttons agar terpusat secara horizontal */
        #floor-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Untuk memberikan jarak dari atas */
        }

        /* Style untuk tabel toko */
        .store-table {
            width: 80%;
            margin: 20px auto; /* Untuk membuat tabel berada di tengah */
            border-collapse: collapse;
        }



        /* Style untuk sel header */
        .store-table th {
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid #ddd; /* Garis bawah */
        }

        /* Style untuk sel data */
        .store-table td {
            padding: 10px;
            text-align: center;

            border-bottom: 1px solid #ddd; /* Garis bawah */
        }

        /* Style untuk baris ganjil */
        .store-table tbody tr:nth-child(odd) {
            background-color: #f2f2f2; /* Warna latar belakang ganjil */
        }

        /* Menyembunyikan semua tabel kecuali yang pertama */
        .store-table {
            display: none;
        }

</style> --}}
<style>
.site-wrap {
    padding-top: 60px !important; /* Ganti 100px dengan tinggi navbar Anda */
}
/* body {
    background-color: #eee;
} */

/* .mt-100 {
    margin-top: 100px;
} */

.card {
    border-radius: 7px !important;
    border-color: #e1e7ec;
    max-width: 300px; /* Set maximum width for cards */
    max-height: 400px; /* Set maximum height for cards */
    margin: 0 auto; /* Center align the card if it has a max-width */
}

.mb-30 {
    margin-bottom: 30px !important;
}

.card-img-tiles {
    display: block;
    border-bottom: 1px solid #e1e7ec;
}

a {
    color: #0da9ef;
    text-decoration: none !important;
}

.card-img-tiles>.inner {
    display: table;
    width: 100%;
}

.card-img-tiles .main-img, .card-img-tiles .thumblist {
    display: table-cell;
    width: 65%;
    padding: 15px;
    vertical-align: middle;
}

.card-img-tiles .main-img>img:last-child, .card-img-tiles .thumblist>img:last-child {
    margin-bottom: 0;
}

.card-img-tiles .main-img>img, .card-img-tiles .thumblist>img {
    display: block;
    width: 100%;
    margin-bottom: 6px;
    max-height: 200px; /* Set maximum height for images */
    object-fit: cover; /* Ensures the image covers the container without distortion */
}

.thumblist {
    width: 35%;
    border-left: 1px solid #e1e7ec !important;
    display: table-cell;
    width: 65%;
    padding: 15px;
    vertical-align: middle;
}

.card-img-tiles .thumblist>img {
    display: block;
    width: 100%;
    margin-bottom: 6px;
    max-height: 200px; /* Set maximum height for images */
    object-fit: cover; /* Ensures the image covers the container without distortion */
}

.btn-group-sm>.btn, .btn-sm {
    padding: .45rem .5rem !important;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}

/* Custom CSS for 5 columns */
.col-lg-2_4 {
    flex: 0 0 20%;
    max-width: 20%;
}
@media (max-width: 1200px) {
    .col-lg-2_4 {
        flex: 0 0 25%;
        max-width: 25%;
    }
}
@media (max-width: 992px) {
    .col-lg-2_4 {
        flex: 0 0 33.3333%;
        max-width: 33.3333%;
    }
}
@media (max-width: 768px) {
    .col-lg-2_4 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}
@media (max-width: 576px) {
    .col-lg-2_4 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}
.swiper-container {
    width: 100%;
    overflow: hidden;
    padding-top: 10px;
    padding-bottom: 20px;
    max-height: 110px;
}

.swiper-wrapper {
    display: flex;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    justify-content: center;
    align-items: center;
}

.kategori-item {
    width: 100px;
    text-align: center;
}

.kategori-title {
    font-size: 14px;
    margin-top: 10px;
}

.swiper-pagination {
    margin-top: 10px; /* Reduce the space between categories and pagination */
}

.swiper-button-next,
.swiper-button-prev {
    color: black;
    top: 80%; /* Position the buttons vertically in the middle */
    color: #757575; /* Warna abu-abu */
    font-size: 10px; /* Ukuran font */
    width: 40px; /* Lebar tombol */
    height: 40px; /* Tinggi tombol */
    line-height: 40px; /* Ketinggian garis teks */
    background-color: transparent; /* Agar latar belakangnya transparan */
    opacity: 0.7; /* Ketransparanan */
}

.swiper-button-next {
    right: 10%; /* Position the next button on the right side */
}

.swiper-button-prev {
    left: 10%; /* Position the prev button on the left side */
}

@media (max-width: 768px) {
    .swiper-slide {
        width: auto;
    }

    .kategori-item {
        width: 80px;
    }

    .kategori-title {
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .kategori-item {
        width: 60px;
    }

    .kategori-title {
        font-size: 10px;
    }
}

/* Sembunyikan bullet list */
#store-list {
    list-style: none;
    padding: 0;
}

#store-list {
    list-style: none;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Untuk menjaga jarak antara elemen pada baris */
}

.store {
    width: 100%; /* Agar 2 item bisa muat dalam 1 baris */
    margin-bottom: 10px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f8f9fa;
}

/* Style untuk tombol floor */
.floor-button {
    margin: 5px;
    padding: 10px 20px;
    border-radius: 15px;
    font-size: 16px;
    font-weight: bold;
    text-align: center; /* Menengahkan teks tombol */
}

/* Style untuk tombol floor saat dihover */
.floor-button:hover {
    background-color: #7971ea; /* Warna background saat dihover */
}

/* Style untuk tombol floor saat diaktifkan */
/* Style for active floor button */
.floor-button.active {
    background-color: white; /* Set the background color to white */
    color: #7971ea; /* Set the text color */
    border-color: #7971ea; /* Set the border color */
}

#floor-buttons {
    text-align: center !important;
}

/* Style untuk tabel toko */
.store-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Style untuk header tabel */
.store-table thead {
    background-color: #7971ea; /* Warna latar belakang header */
    color: #fff; /* Warna teks header */
}

/* Style untuk sel header */
.store-table th {
    padding: 10px;
    text-align: left;
    border-bottom: 2px solid #ddd; /* Garis bawah */
}

/* Style untuk sel data */
.store-table td {
    padding: 10px;
    border-bottom: 1px solid #ddd; /* Garis bawah */
}

/* Style untuk baris ganjil */
.store-table tbody tr:nth-child(odd) {
    background-color: #f2f2f2; /* Warna latar belakang ganjil */
}

/* Mengatur div floor-buttons agar terpusat secara horizontal */
#floor-buttons {
    display: flex;
    justify-content: center;
    margin-top: 20px; /* Untuk memberikan jarak dari atas */
}

/* Style untuk tabel toko */
.store-table {
    width: 80%;
    margin: 20px auto; /* Untuk membuat tabel berada di tengah */
    border-collapse: collapse;
}

/* Style untuk sel header */
.store-table th {
    padding: 10px;
    text-align: center;
    border-bottom: 2px solid #ddd; /* Garis bawah */
}

/* Style untuk sel data */
.store-table td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd; /* Garis bawah */
}

/* Style untuk baris ganjil */
.store-table tbody tr:nth-child(odd) {
    background-color: #f2f2f2; /* Warna latar belakang ganjil */
}

/* Menyembunyikan semua tabel kecuali yang pertama */
.store-table {
    display: none;
}

.carousel-item img {
    height: 500px; /* Adjust this value as needed */
    object-fit: cover;
}
</style>

<div class="site-wrap">

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          @foreach ($carousel as $key => $carousel)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
              <img class="d-block w-100" src="{{  asset('images/caraousel/' . $carousel->gambar_caraousel) }}" alt="{{ $carousel->title }}">
              <div class="carousel-caption d-none d-md-block">
                  {{-- <h5>{{ $carousel->title }}</h5> --}}
                  <p>{{ $carousel->deskripsi }}</p>
                  <a href="/shop" class="btn btn-sm btn-primary">Shop Now</a>
              </div>
          </div>
          @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>


  <div class="container text-center my-4">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($kategori as $kat)
            <div class="swiper-slide">
                <div class="kategori-item text-center" style="transition: transform 0.3s;">
                    <a href="{{ route('kategori.show', $kat->kategori_id) }}" class="kategori-link text-decoration-none d-block">
                        <img src="{{ asset('images/kategori/'.$kat->foto) }}" class="rounded-circle mx-auto d-block" alt="Foto Kategori" style="width: 70px; height: 70px; object-fit: cover;">
                    </a>
                    <div class="mt-2">
                        <h5 class="kategori-title" style="font-size: 16px; color: black; font-weight: bold;">{{ $kat->nama_kategori }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<div class="jarak"></div>
</div>




  <!-- List Produk -->
  <div class="site-section block-3 site-blocks-2 bg-light">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Daftar Toko</h2>
            </div>
        </div>
        <div id="floor-buttons" class="btn-group mb-4" role="group">
            <button class="floor-button btn btn-primary" data-floor="Lantai 1">Lantai 1</button>
            <button class="floor-button btn btn-primary" data-floor="Balairung">Balairung</button>
            <button class="floor-button btn btn-primary" data-floor="Lantai 2">Lantai 2</button>
        </div>
    
        @foreach (['Lantai 1', 'Balairung', 'Lantai 2'] as $floor)
        <table class="store-table table table-striped d-none" id="{{ str_replace(' ', '-', strtolower($floor)) }}-floor">
            <thead>
                <tr>
                    <th>Nama Toko</th>
                    <th>Nomor Toko</th>
                    {{-- <th>Lantai</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($users->where('lantai_toko', $floor) as $user)
                    <tr onclick="window.location='{{ route('toko.show', ['id' => $user->user_id]) }}';" style="cursor: pointer;">
                        <td>{{ $user->nama_toko }}</td>
                        <td>{{ $user->nomor_toko }}</td>
                        {{-- <td>{{ $user->lantai_toko }}</td> --}}
                    </tr>
                @endforeach
                
                {{-- <tbody>
                    @foreach($stores as $store)
                    <tr data-href="{{ route('shop.show', ['id' => $store->id]) }}">
                        <td>{{ $store->nama_toko }}</td>
                        <td>{{ $store->kategori }}</td>
                        <td>{{ $store->deskripsi }}</td>
                        <td>{{ $store->lokasi }}</td>
                    </tr>
                    @endforeach
                </tbody> --}}
            </tbody>
        </table>
        @endforeach
    </div>
    <div class="jarak"></div>


    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Produk Kami</h2>
        </div>
      </div>
      <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12 order-2">
              {{-- <div class="row mb-5">
                @foreach ($produk->where('is_hidden', false) as $produks)
                    <div class="col-md-4 col-sm-6 col-lg-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm" style="border-radius: 0.5rem; overflow: hidden;">
                            <a class="card-img-tiles" href="shop_detail/{{$produks->produk_id}}" data-abc="true">
                                <div class="inner">
                                    <div class="main-img position-relative">
                                        <img src="{{ asset('images/produk/' . $produks->gambar_produk) }}" alt="Category" style="width: 100%; height: 200px; object-fit: cover;">
                                    </div>
                                </div>
                            </a>
                            <div class="card-body text-center d-flex flex-column justify-content-between" style="padding: 1rem;">
                                <div class="d-flex flex-column align-items-center">
                                    <h5 class="card-title font-weight-bold mb-2" style="font-size: 1.1rem; text-align: center;">{{$produks->nama_produk}}</h5>
                                    <p class="text-muted mb-3" style="font-size: 1rem; color: #555;">Rp {{ number_format($produks->harga, 0, ',', '.') }}</p>
                                    <p class="card-text">Stok: {{ $produks->stok }}</p>
                                </div>
                                <a class="btn btn-outline-primary btn-sm mt-auto" href="shop_detail/{{$produks->produk_id}}" data-abc="true" style="border-radius: 20px;">View Products</a>
                            </div>
                        </div>
                    </div>
                @endforeach


                <!-- Repeat similar blocks for other products to fill up the row -->
                <!-- ... -->
              </div> --}}
              <div class="row mb-5">
                    @foreach ($produk as $produks)
                        @if ($produks->stok == 0)
                            @php
                                $produks->is_hidden = true;
                            @endphp
                        @endif
                
                        @if (!$produks->is_hidden)
                            <div class="col-md-4 col-sm-6 col-lg-3 mb-4">
                                <div class="card h-100 border-0 shadow-sm" style="border-radius: 0.5rem; overflow: hidden;">
                                    <a class="card-img-tiles" href="shop_detail/{{ $produks->produk_id }}" data-abc="true">
                                        <div class="inner">
                                            <div class="main-img position-relative">
                                                <img src="{{ asset('images/produk/' . $produks->gambar_produk) }}" alt="Category" style="width: 100%; height: 200px; object-fit: cover;">
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body text-center d-flex flex-column justify-content-between" style="padding: 1rem;">
                                        <div class="d-flex flex-column align-items-center">
                                            <h5 class="card-title font-weight-bold mb-2" style="font-size: 1.1rem; text-align: center;">{{ $produks->nama_produk }}</h5>
                                            <p class="text-muted mb-3" style="font-size: 1rem; color: #555;">Rp {{ number_format($produks->harga, 0, ',', '.') }}</p>
                                            <p class="card-text">Stok: {{ $produks->stok }}</p>
                                        </div>
                                        <a class="btn btn-outline-primary btn-sm mt-auto" href="shop_detail/{{ $produks->produk_id }}" data-abc="true" style="border-radius: 20px;">View Products</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
              <div class="row" data-aos="fade-up">
                <div class="col-md-12 text-center">
                  <a href="{{route('shop.index')  }}" class="btn btn-primary btn-lg">Lihat Lainnya</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi
        const buttons = document.querySelectorAll('.floor-button');
        const tables = document.querySelectorAll('.store-table');

        function showTable(floor) {
            // Sembunyikan semua tabel
            tables.forEach(table => {
                table.classList.add('d-none');
            });

            // Tampilkan tabel yang sesuai
            document.getElementById(floor).classList.remove('d-none');
        }

        function setActiveButton(button) {
            // Hapus kelas aktif dari semua tombol
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });

            // Tambahkan kelas aktif ke tombol yang sesuai
            button.classList.add('active');
        }

        // Tambahkan event listener ke semua tombol
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const floor = button.getAttribute('data-floor').replace(' ', '-').toLowerCase() + '-floor';
                showTable(floor);
                setActiveButton(button);
            });
        });

        // Tampilkan lantai pertama secara default
        buttons[0].click();
    });
</script>
@endsection

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 8,
            spaceBetween: 10,
            slidesPerGroup: 8,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                480: {
                    slidesPerView: 5,
                    slidesPerGroup: 5,
                },
                768: {
                    slidesPerView: 5,
                    slidesPerGroup: 5,
                },
                1024: {
                    slidesPerView: 6,
                    slidesPerGroup: 6,
                },
                1200: {
                    slidesPerView: 8,
                    slidesPerGroup: 8,
                },
            },
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Ambil semua tombol lantai
        const floorButtons = document.querySelectorAll('.floor-button');
        // Ambil semua tabel
        const storeTables = document.querySelectorAll('.store-table');

        // Tambahkan event listener untuk setiap tombol lantai
        floorButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Ambil lantai yang diklik
                const floor = button.getAttribute('data-floor').toLowerCase().replace(' ', '-');

                // Sembunyikan semua tabel
                storeTables.forEach(table => {
                    table.style.display = 'none';
                });

                // Tampilkan tabel yang sesuai dengan lantai yang diklik
                document.getElementById(`${floor}-floor`).style.display = 'table';
            });
        });

        // Default tampilkan tabel lantai pertama
        document.getElementById('lantai-1-floor').style.display = 'table';
    });
</script>