<!DOCTYPE html>
<html lang="en">
<head>
    <title>Partiga - tiga</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="/images/logo.png">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Tambahkan ini di bagian <head> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    



    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style>
            .social-icons {
                padding: 0;
                list-style: none;
                display: flex;
                gap: 15px;
            }
            .social-icons li {
                display: inline-block;
            }
            .social-icons a {
                font-size: 1.5em;
                text-decoration: none;
            }
            .site-footer {
        background-color: #f8f9fa;
        padding: 20px 0;
    }

    .site-footer  {
        max-height: 1000px;
        padding: 0 15px;
    }

    .footer-heading {
        color: #343a40;
        margin-top: 10px; /* Sesuaikan margin atas untuk heading */
    }
    .copy{
        margin-top: 10px !important;
    }
        /* CSS for Search Results */
        #searchResults {
            position: absolute;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ddd;
            z-index: 999;
            margin-top: 38px; /* Adjust as needed */
            max-height: 300px; /* Adjust as needed */
            overflow-y: auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
    
        .product-result {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    
        .product-result img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            object-fit: cover;
            border-radius: 4px;
        }
    
        .product-result h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 400;
            color: #333;
        }
    
        .product-result:hover {
            background-color: #f7f7f7;
        }
    
        .no-results {   
            padding: 10px;
            text-align: center;
            color: #777;
        }
    </style>
    
</head>
<body>
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left" style="border: 1px solid; border-radius:50px; max-width:20rem;">
                            <form class="site-block-top-search">
                                <span class="icon icon-search2"></span>
                                <input type="text" id="searchInput" class="form-control border-0" placeholder="Search">
                            </form>
                            <div id="searchResults"></div> <!-- Search results will be displayed here -->
                        </div>
                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="{{ route('home') }}" class="js-logo-clone">ParTiga-tiga</a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul>
                                    @guest
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    |&nbsp;
                                    <li><a href="{{ route('register') }}">Daftar</a></li>&nbsp;
                                    @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <span class="icon icon-person"></span>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            {{-- <li>
                                                <a href="/profile">Profile</a>
                                            </li> --}}
                                            <li>
                                                <a href="/history">History Pembelian</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @endguest
                                    <li>
                                        <a href="{{ route('cart.index') }}" class="site-cart">
                                            <span class="icon icon-shopping_cart"></span>
                                            <span class="count">{{ $cartItemCount }}</span> <!-- Display total items -->
                                        </a>
                                    </li>
                                    <li class="d-inline-block d-md-none ml-md-0">
                                        <a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('master')
        
        <div class="jarak"></div>
        <footer class="site-footer border-top">
            <div class="container">
              <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                  <!-- Google Maps -->
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127231.46241867989!2d98.95505128088487!3d2.3342217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0467abac6045%3A0x2def9558f53e68b4!2sPasar%20Balige!5e0!3m2!1sen!2sid!4v1684920164933!5m2!1sen!2sid" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                      <h3 class="footer-heading mb-4" style="padding-top:10px;">Hubungi Kami :</h3>
                      <ul class="list-unstyled">
                        <li class="address">83M8+M7M, Jl. Sm Raja, Napitupulu Bagasan, Kec. Balige, Toba, Sumatera Utara</li>
                        <li class="phone"><a href="tel://625947505435">+6259 4750 5435</a></li>
                        <li class="email">PartigaTiga@gmail.com</li>
                      </ul>
                    </div>
                    <div class="col-md-12">
                      <h3 class="footer-heading mb-4" style="padding-top:30px;">Ikuti Kami:</h3>
                      <ul class="social-icons">
                        <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12 copy">
                  <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved<i aria-hidden="true"></i> by <a target="_blank" class="text-primary">Kelompok 5 PA II</a>
                  </p>
                </div>
              </div>
            </div>
          </footer>
    </div>

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
    <script>
         $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var query = $(this).val();
                if (query === '') {
                    $('#searchResults').empty();
                } else {
                    $.ajax({
                        url: "{{ route('search') }}",
                        type: "GET",
                        data: {'query': query},
                        success: function(data) {
                            displayResults(data);
                        }
                    });
                }
            });

            $('#searchInput').on('keypress', function(e) {
                if (e.which === 13) { // 13 is the Enter key
                    e.preventDefault(); // Prevent the default form submit action
                    var query = $(this).val();
                    if (query !== '') {
                        window.location.href = '{{ route("search.results") }}?query=' + query;
                    }
                }
            });

            // Function to display search results
            function displayResults(data) {
                var products = data.products;
                var stores = data.stores;
                var html = '';

                if (products.length > 0 || stores.length > 0) {
                    // Display products
                    products.forEach(function(product) {
                        var productUrl = "{{ url('shop_detail') }}/" + product.produk_id;
                        html += '<div class="product-result" data-url="' + productUrl + '">';
                        html += '(Produk)&nbsp;<h3>'  + product.nama_produk + '</h3>';
                        html += '</div>';
                    }); 

                    // Display stores
                    stores.forEach(function(store) {
                        var storeUrl = "{{ url('toko') }}/" + store.user_id;
                        html += '<div class="product-result" data-url="' + storeUrl + '">';
                        html += '(Toko)&nbsp;<h3>' + store.nama_toko + '</h3>';
                        html += '</div>';       
                    });
                } else {
                    html += '<div class="no-results">No results found</div>';
                }

                $('#searchResults').html(html);
            }

            // Add click event listener for search results
            $(document).on('click', '.product-result', function() {
                var url = $(this).data('url');
                if (url !== '') {
                    window.location.href = url;
                }
            });
        });



        

        function deleteItem(cartId) {
        if (confirm('Apakah anda yakin ingin menghapus?')) {
                // Membuat permintaan POST menggunakan JavaScript
                fetch("{{ route('cart.remove', ':cartId') }}".replace(':cartId', cartId), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        _method: 'DELETE'
                    })
                })
                .then(response => {
                    if (response.ok) {
                        // Jika penghapusan berhasil, Anda dapat melakukan sesuatu seperti memperbarui tampilan
                        location.reload();
                    } else {
                        alert('Terjadi kesalahan saat menghapus item.');
                    }
                })
                .catch(error => {
                    alert('Terjadi kesalahan saat menghapus item.');
                    console.error(error);
                });
            }
        }

        $(document).ready(function() {
            // Event listener pada dropdown sortir
            $('.dropdown-item').on('click', function(e) {
                e.preventDefault();
                var sortBy = $(this).data('sort');
                window.location.href = "{{ route('shop.sort', ['sortBy' => 'SORTBY_VALUE']) }}".replace('SORTBY_VALUE', sortBy);
            });
        });


        function updateQuantity(cartId, newQuantity) {
            $.ajax({
                type: 'POST',
                url: '{{ route("cart.update", ":cartId") }}'.replace(':cartId', cartId),
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: newQuantity
                },
                success: function(response) {
                    console.log(response.message);
                    // Anda dapat memperbarui UI untuk menampilkan kuantitas terbaru
                    location.reload(); // Atau gunakan AJAX untuk memperbarui kuantitas tanpa memuat ulang halaman
                },
                error: function(xhr, status, error) {
                    console.error(error);
             }
            });
        }
    </script>
        
        
</body>
</html>
