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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('admin_assets/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('../layoutsadmin/sidebaradmin')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            @include('../layoutsadmin/navbaradmin')
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Kategori</h1>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6><hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="button" class="btn btn-success" onclick="location.href='{{ route('tambahkategori') }}'">+Tambah Kategori</button>
                            <div class="input-group ml-auto" style="width: 300px;">
                                {{-- <input type="text" class="form-control" placeholder="Cari kategori..." aria-label="Cari kategori..." aria-describedby="button-addon2" id="keyword"> --}}
                                <input type="text" id="searchInput" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
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
                                        <th>ID</th>
                                        <th>Nama Kategori</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kategori as $item)
                                    <tr>
                                        <td>{{ $item->kategori_id }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td>
                                            @if($item->foto)
                                            <img src="{{ asset('images/kategori/'.$item->foto) }}" alt="Foto Kategori" width="100">
                                        @else
                                            Tidak ada foto
                                        @endif
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('editkategori', ['id' => $item->kategori_id]) }}'">Edit</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $item->kategori_id }}">Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->kategori_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Apakah Anda yakin ingin menghapus kategori ini?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                    <form action="{{ route('deletekategori', ['id' => $item->kategori_id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>


            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

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
                let productName = row.querySelector('td:nth-child(2)').innerText.toUpperCase();
                row.style.display = productName.includes(filter) ? '' : 'none';
            });
        });
    
        
        </script>


    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/js/sb-admin-2.js') }}"></script>


    <!-- Page level plugins -->
    <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin_assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin_assets/js/demo/chart-pie-demo.js') }}"></script>


</body>

</html>
