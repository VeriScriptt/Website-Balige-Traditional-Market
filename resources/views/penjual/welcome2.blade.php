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


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .custom-card {
            height: 250px;
        }
        .text-center{
            align-content: center;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('../layoutspenjual/sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('../layoutspenjual/navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row min-vh-150 justify-content-center align-items-center">
                                <!-- Penjualan Bulan Ini -->
                                <div class="col-md-4 mb-4">
                                    <div class="card custom-card bg-gradient-primary text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Penjualan Bulan Ini</div>
                                            <div class="h5 mb-3 font-weight-bold">Rp.{{ number_format($penjualanBulanIni, 0, ',', '.') }}</div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-calendar fa-lg mr-2"></i> Bulan Ini
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Penjualan Tahunan -->
                                <div class="col-md-4 mb-4">
                                    <div class="card custom-card bg-gradient-success text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Penjualan Tahunan</div>
                                            <div class="h5 mb-3 font-weight-bold">Rp.{{ number_format($penjualanTahunIni, 0, ',', '.') }}</div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-calendar-alt fa-lg mr-2"></i> Tahun Ini
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <!-- Pesanan Diselesaikan -->
                                <div class="col-md-4 mb-4">
                                    <div class="card custom-card bg-gradient-info text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Diselesaikan</div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $pesananSelesai }}</div>
                                            <div class="progress progress-sm mb-3">
                                                <div class="progress-bar bg-light" role="progressbar" style="width: {{ ($pesananSelesai / $totalPesanan) * 100 }}%"></div>
                                            </div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-spinner fa-lg mr-2"></i> {{ ($pesananSelesai / $totalPesanan) * 100 }}% Diproses
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pesanan Dalam Proses -->
                                <div class="col-md-4 mb-4">
                                    <div class="card custom-card bg-gradient-info text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Dalam Proses</div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $pesananDiproses }}</div>
                                            <div class="progress progress-sm mb-3">
                                                <div class="progress-bar bg-light" role="progressbar" style="width: {{ ($pesananDiproses / $totalPesanan) * 100 }}%"></div>
                                            </div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-spinner fa-lg mr-2"></i> {{ ($pesananDiproses / $totalPesanan) * 100 }}% Diproses
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- Pesanan Diselesaikan -->
                                <div class="col-md-4 mb-4">
                                    <div class="card custom-card bg-gradient-info text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Diselesaikan</div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $pesananSelesai }}</div>
                                            <div class="progress progress-sm mb-3">
                                                <div class="progress-bar bg-light" role="progressbar" style="width: {{ $totalPesanan > 0 ? ($pesananSelesai / $totalPesanan) * 100 : 0 }}%"></div>
                                            </div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-spinner fa-lg mr-2"></i> {{ $totalPesanan > 0 ? ($pesananSelesai / $totalPesanan) * 100 : 0 }}% Diselesaikan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pesanan Dalam Proses -->
                                <div class="col-md-4 mb-4">
                                    <div class="card custom-card bg-gradient-info text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Dalam Proses</div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $pesananDiproses }}</div>
                                            <div class="progress progress-sm mb-3">
                                                <div class="progress-bar bg-light" role="progressbar" style="width: {{ $totalPesanan > 0 ? ($pesananDiproses / $totalPesanan) * 100 : 0 }}%"></div>
                                            </div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-spinner fa-lg mr-2"></i> {{ $totalPesanan > 0 ? ($pesananDiproses / $totalPesanan) * 100 : 0 }}% Diproses
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pesanan Baru -->
                                {{-- <div class="col-md-4 mb-4">
                                    <div class="card custom-card bg-gradient-warning text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Baru</div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $pesananBaru }}</div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-box fa-lg mr-2"></i> {{ $pesananBaru }} Pesanan Baru
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- Total Produk -->
                                <div class="col-md-4 mb-4">
                                    <div class="card custom-card bg-gradient-info text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Produk</div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $totalProduk }}</div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-cube fa-lg mr-2"></i> {{ $totalProduk }} Produk
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Total Transaksi -->
                                <div class="col-md-4 mb-4">
                                    <div class="card custom-card bg-gradient-warning text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Transaksi</div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $totalTransaksi }}</div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-shopping-cart fa-lg mr-2"></i> {{ $totalTransaksi }} Transaksi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->



                        <!-- Pie Chart -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin_assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin_assets/js/demo/chart-pie-demo.js') }}"></script>


</body>

</html>
