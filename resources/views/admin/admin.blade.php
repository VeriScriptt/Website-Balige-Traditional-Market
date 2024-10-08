{{-- <!DOCTYPE html>
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
            margin-bottom: 30px;
        }
        .text-center{
            align-content: center;
        }
    </style>

</head> --}}


@extends('template.master_admin')
@section('master_admin')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('../layoutsadmin/sidebaradmin')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Topbar -->
                @include('../layoutsadmin/navbaradmin')
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
                                <div class="col-md-6 mb-6">
                                    <div class="card custom-card bg-gradient-primary text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Akun Pembeli</div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $user->where('role', 'pembeli')->count() }}</div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-calendar fa-lg mr-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <div class="card custom-card bg-gradient-primary text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Kategori </div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $kategori->count() }}</div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-calendar fa-lg mr-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <!-- Penjualan Tahunan -->
                                <div class="col-md-6 mb-6">
                                    <div class="card custom-card bg-gradient-success text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Toko</div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $user->where('role','penjual')->count() }}</div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-calendar-alt fa-lg mr-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pesanan Diproses -->
                                <div class="col-md-6 mb-6">
                                    <div class="card custom-card bg-gradient-info text-white shadow">
                                        <div class="card-body text-center">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Akun Penjual Menunggu Persetujuan</div>
                                            <div class="h5 mb-3 font-weight-bold">{{ $pendingSellers }}</div>
                                            <div class="progress progress-sm mb-3">
                                                <div class="progress-bar bg-light" role="progressbar" style="width: 50%"></div>
                                            </div>
                                            <div class="text-gray-300">
                                                <i class="fas fa-spinner fa-lg mr-2"></i>
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

    {{-- <!-- Bootstrap core JavaScript-->
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

</html> --}}
@endsection