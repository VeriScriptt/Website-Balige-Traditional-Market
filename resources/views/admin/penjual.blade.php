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
                <h1 class="h3 mb-2 text-gray-800">Akun Penjual</h1>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Penjual</h6>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSellerModal">+Tambah Penjual</button>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nama Toko</th>
                                        <th>Letak Toko</th>
                                        <th>Nomor Kios</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penjual as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->nama_toko }}</td>
                                        <td>{{ $user->lantai_toko }}</td>
                                        <td>{{ $user->nomor_toko }}</td>
                                        <td>
                                            <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#detailpenjualModal"
                                                data-id="{{ $user->user_id }}"
                                                data-name="{{ $user->name }}"
                                                data-toko="{{ $user->nama_toko }}"
                                                data-kios="{{ $user->nomor_toko }}"
                                                data-email="{{ $user->email }}"
                                                data-lantai="{{ $user->lantai_toko }}"
                                                data-telepon="{{ $user->nomor_telepon }}"
                                                data-tgllahir="{{ $user->tanggal_lahir }}"
                                                data-foto="{{ $user->gambar_toko ? asset('images/gambar_toko/' . $user->gambar_toko) : asset('storage/app/public/images/toko.jpeg') }}">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">Detail</span>
                                            </button>
                                        
                                            @if($user->active)
                                                <form action="{{ route('admin.penjual.deactivate', $user->user_id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to deactivate this user?');">Deactivate</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.penjual.activate', $user->user_id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to activate this user?');">Activate</button>
                                                </form>
                                            @endif
                                        
                                            @if($user->verified)
                                                <form action="{{ route('admin.penjual.unverify', $user->user_id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to unverify this user?');">Unverify</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.penjual.verify', $user->user_id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to verify this user?');">Verify</button>
                                                </form>
                                            @endif
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

    @include('admin.add_seller_modal')

    <!-- Modal for displaying seller details -->
    <div class="modal fade" id="detailpenjualModal" tabindex="-1" role="dialog" aria-labelledby="detailpenjualModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailpenjualModalLabel">Detail Penjual</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="small mb-1 text-dark">Nama Toko:</label>
                        <div id="modalNamaToko"></div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark"></label>
                        <img id="modalFoto" src="" alt="Foto Toko" style="width: 200px">
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-12">
                            <label class="small mb-1 text-dark">Nama Lengkap:</label>
                            <div id="modalNamaLengkap"></div>
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-3">
                            <label class="small mb-1 text-dark">Nomor Kios:</label>
                            <div id="modalNomorKios"></div>
                        </div>
                        <div class="col-md-3">
                            <label class="small mb-1 text-dark">Lantai:</label>
                            <div id="modalLantai"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1 text-dark">Email:</label>
                        <div id="modalEmail"></div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1 text-dark">Nomor Telepon:</label>
                            <div id="modalNomorTelepon"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1 text-dark">Tanggal Lahir:</label>
                            <div id="modalTanggalLahir"></div>
                        </div>
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
        $('#detailpenjualModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var toko = button.data('toko');
            var kios = button.data('kios');
            var lantai = button.data('lantai');
            var email = button.data('email');
            var telepon = button.data('telepon');
            var tgllahir = button.data('tgllahir');
            var foto = button.data('foto');

            console.log('ID:', id);
            console.log('Name:', name);
            console.log('Toko:', toko);
            console.log('Kios:', kios);
            console.log('Lantai:', lantai);
            console.log('Email:', email);
            console.log('Telepon:', telepon);
            console.log('Tanggal Lahir:', tgllahir);
            console.log('Foto:', foto);

            var modal = $(this);
            modal.find('#modalNamaToko').text(toko);
            modal.find('#modalNamaLengkap').text(name);
            modal.find('#modalNomorKios').text(kios);
            modal.find('#modalLantai').text(lantai);
            modal.find('#modalEmail').text(email);
            modal.find('#modalNomorTelepon').text(telepon);
            modal.find('#modalTanggalLahir').text(tgllahir);
            modal.find('#modalFoto').attr('src', foto);
        });
    </script>
</body>

</html>
