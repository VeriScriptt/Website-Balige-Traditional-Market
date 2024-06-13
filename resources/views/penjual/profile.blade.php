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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .img-account-profile {
            max-width: 300px; /* Atur lebar maksimum gambar */
            max-height: 300px; /* Atur tinggi maksimum gambar */
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
            @include('../layoutspenjual/navbar')
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Profile</h1>
                <!-- DataTales Example -->
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header py-3">Gambar Toko</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                {{-- <img class="img-account-profile mb-2" src="{{ asset($user->gambar_toko) }}" alt="{{ $user->nama_toko }}"> --}}
                                <img class="img-account-profile mb-2" src="{{ $user->gambar_toko ? asset('images/gambar_toko/' . $user->gambar_toko) : asset('storage/app/public/images/toko.jpeg') }}" alt="{{ $user->nama_toko }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header py-3">Account Details</div>
                            <div class="card-body">
                                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Nama Toko</label>
                                        <input class="form-control" id="inputUsername" type="text" name="nama_toko" value="{{ $user->nama_toko }}">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputFirstName">Nama Lengkap (Sesuai KTP / KK)</label>
                                            <input class="form-control" id="inputFirstName" type="text" name="name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-3">
                                            <label class="small mb-1" for="inputOrgName">Nomor Kios</label>
                                            <input class="form-control" id="inputOrgName" type="text" name="nomor_toko" value="{{ $user->nomor_toko }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="small mb-1" for="inputOrgName">NIK</label>
                                            <input class="form-control" id="inputOrgName" type="text" name="nik" value="{{ $user->nik }}">
                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-3">
                                            <label class="small mb-1" for="inputLocation">Lantai</label>
                                            <input class="form-control" id="inputLocation" type="text" name="lantai_toko" value="{{ $user->lantai_toko }}">
                                        </div>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" name="email" value="{{ $user->email }}">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputPhone">Nomor Telepon</label>
                                            <input class="form-control" id="inputPhone" type="tel" name="nomor_telepon" value="{{ $user->nomor_telepon }}">
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputBirthday">Tanggal Lahir</label>
                                            <input class="form-control" id="inputBirthday" type="text" name="tanggal_lahir" value="{{ $user->tanggal_lahir ? $user->tanggal_lahir->format('d/m/Y') : '' }}">
                                        </div>
                                    </div>
                                    <!-- Form Group (profile picture)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputProfilePicture">Gambar Toko</label>
                                        <input class="form-control" id="inputProfilePicture" type="file" name="gambar_toko">
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </form>
                            </div>
                        </div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
