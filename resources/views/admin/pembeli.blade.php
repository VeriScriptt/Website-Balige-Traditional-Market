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
    <link href="{{ asset('admin_assets/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                <h1 class="h3 mb-2 text-gray-800">Akun Pembeli</h1>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Pembeli</h6>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Nomor Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembeli as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->nomor_telepon }}</td>
                                        <td>
                                            <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#detailPembeliModal"
                                                data-id="{{ $user->user_id }}"
                                                data-name="{{ $user->name }}"
                                                data-email="{{ $user->email }}"
                                                data-telepon="{{ $user->nomor_telepon }}"
                                                data-tgllahir="{{ $user->tanggal_lahir }}"
                                                data-alamat="{{ $user->alamat }}">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">Detail</span>
                                            </button>
                                        
                                            @if($user->active)
                                                <form action="{{ route('admin.pembeli.deactivate', $user->user_id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to deactivate this user?');">Deactivate</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.pembeli.activate', $user->user_id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to activate this user?');">Activate</button>
                                                </form>
                                            @endif

                                            {{-- <form action="{{ route('admin.pembeli.delete', $user->user_id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                            </form> --}}
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

    <!-- Modal for displaying buyer details -->
    <div class="modal fade" id="detailPembeliModal" tabindex="-1" role="dialog" aria-labelledby="detailPembeliModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPembeliModalLabel">Detail Pembeli</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row gx-3 mb-3">
                        <div class="col-md-12">
                            <label class="small mb-1 text-dark">Nama Lengkap:</label>
                            <div id="modalNamaLengkap"></div>
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-12">
                            <label class="small mb-1 text-dark">Email:</label>
                            <div id="modalEmail"></div>
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1 text-dark">Nomor Telepon:</label>
                            <div id="modalNomorTelepon"></div>
                        </div>
                        {{-- <div class="col-md-6">
                            <label class="small mb-1 text-dark">Tanggal Lahir:</label>
                            <div id="modalTanggalLahir"></div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTable initialization -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    <!-- Modal script -->
    <script>
        $('#detailPembeliModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var email = button.data('email');
            var telepon = button.data('telepon');
            var tgllahir = button.data('tgllahir');
            var alamat = button.data('alamat');

            console.log(tgllahir); // Debugging to check if tgllahir is passed correctly

            var modal = $(this);
            modal.find('#modalNamaLengkap').text(name);
            modal.find('#modalEmail').text(email);
            modal.find('#modalNomorTelepon').text(telepon);
            // modal.find('#modalTanggalLahir').text(tgllahir ? tgllahir : 'Tidak ada data');
            // modal.find('#modalAlamat').text(alamat);
        });
    </script>
</body>

</html>
