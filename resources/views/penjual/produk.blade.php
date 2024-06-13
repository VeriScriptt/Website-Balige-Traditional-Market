<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Partiga-Tiga</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <style>
            .warning {
        background-color: #FFC100; /* Kuning dengan opasitas 50% */
        color: rgb(255, 255, 255);
        font-weight: bold;
    }

    .danger {
        background-color: #E72929; /* Merah dengan opasitas 50% */
        color: white;
        font-weight: bold; /* Menambahkan font weight tebal */
    }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('../layoutspenjual/sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            @include('../layoutspenjual/navbar')
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Produk</h1>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('penjual.produk.create') }}" class="btn btn-success">+Tambah Produk</a>
                            <div class="input-group ml-auto search area" style="width: 300px;">
                                <input type="text" id="searchInput" class="form-control bg-light border-0 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 50px;">Foto Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Deskripsi Produk</th>
                                        <th>Kategori</th> <!-- Tambahkan kolom Kategori -->
                                        <th>Stok</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produks as $index => $product)
                                    <tr class="{{ $product->stok == 0 ? 'danger' : ($product->stok <= 5 ? 'warning' : '') }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td><img src="{{ asset('images/produk/' . $product->gambar_produk) }}" width="50px" alt="{{ $product->nama_produk }}"></td>
                                        <td>{{ $product->nama_produk }}</td>
                                        <td>{{ 'Rp.' . number_format($product->harga, 0, ',', '.') }}</td>
                                        <td>{{ $product->deskripsi }}</td>
                                        <td>{{ $product->kategori->nama_kategori }}</td>
                                        <td>{{ $product->stok }}</td>
                                        <td>{{ $product->is_hidden ? 'Disembunyikan' : 'Ditampilkan' }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary text-white" onclick="editProduk({{ $product->produk_id }})">Edit</button>
                                            <button type="button" class="btn btn-toggle-status {{ $product->is_hidden ? 'btn-success' : 'btn-danger' }}" data-id="{{ $product->produk_id }}" onclick="toggleStatus(this)">
                                                {{ $product->is_hidden ? 'Tampilkan' : 'Sembunyikan' }}
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleStatus(button) {
            const produkId = button.getAttribute('data-id');
            const isHidden = button.classList.contains('btn-danger');
            const url = isHidden ? '{{ route("produk.hide", ":id") }}' : '{{ route("produk.unhide", ":id") }}';
            $.ajax({
                url: url.replace(':id', produkId),
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(`Produk berhasil ${isHidden ? 'disembunyikan' : 'ditampilkan'}!`);
                    button.classList.toggle('btn-danger');
                    button.classList.toggle('btn-success');
                    button.textContent = isHidden ? 'Tampilkan' : 'Sembunyikan';
                    button.parentElement.previousElementSibling.textContent = isHidden ? 'Disembunyikan' : 'Ditampilkan';
                },
                error: function(xhr, status, error) {
                    alert(`Terjadi kesalahan saat ${isHidden ? 'menyembunyikan' : 'menampilkan'} produk: ${error}`);
                }
            });
        }

        function editProduk(produkId) {
            window.location.href = '{{ route('produk.edit', '') }}/' + produkId;
        }
    </script>
     <script>
        
    //  FILTER NYA MELALUI SEMUA FIELD   
    // document.getElementById('searchInput').addEventListener('keyup', function() {
    //     let filter = this.value.toUpperCase();
    //     let rows = document.querySelectorAll('#dataTable tbody tr');

    //     rows.forEach(row => {
    //         let text = row.innerText.toUpperCase();
    //         row.style.display = text.includes(filter) ? '' : 'none';
    //     });
    // });

    // FILTER NYA BERDASARKAN NAMA PRODUK SAJA
        document.getElementById('searchInput').addEventListener('keyup', function() {   
        let filter = this.value.toUpperCase();
        let rows = document.querySelectorAll('#dataTable tbody tr');

        rows.forEach(row => {
            let productName = row.querySelector('td:nth-child(3)').innerText.toUpperCase();
            row.style.display = productName.includes(filter) ? '' : 'none';
        });
    });

    $(document).ready(function() {
        $('#dataTable tbody tr').each(function() {
            var stok = parseInt($(this).find('td:eq(6)').text());
            if (stok <= 5) {
                $(this).addClass('warning');
            } else if (stok === 0) {
                $(this).addClass('danger');
            }
        });
    });
    
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/js/sb-admin-2.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>
</body>
</html>
