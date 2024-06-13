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
</head>

<body id="page-top">
    <div id="wrapper">
        @include('../layoutspenjual/sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            @include('../layoutspenjual/navbar')
            <div class="container-fluid">
                <!-- create_produk.blade.php -->
<div class="modal fade" id="tambahProdukModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambah produk -->
                <form id="formTambahProduk" action="{{ route('penjual.produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="namaProduk">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="namaProduk" name="nama_produk" placeholder="Masukkan nama produk" value="{{ old('nama_produk') }}">
                        @error('nama_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file @error('gambar_produk') is-invalid @enderror" id="foto" name="gambar_produk">
                        @error('gambar_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small id="fotoHelp" class="form-text text-muted">Max. size 5MB</small>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Masukkan harga produk" value="{{ old('harga') }}">
                        @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="Masukkan stok produk" value="{{ old('stok') }}">
                        @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi produk">{{ old('deskripsi') }}</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="simpanProduk()">Simpan</button>
            </div>
        </div>
    </div>
  </div>
  
  <script>
    function simpanProduk() {
        // Ambil nilai input
        var namaProduk = document.getElementById("namaProduk").value;
        var harga = parseFloat(document.getElementById("harga").value);
        var stok = parseInt(document.getElementById("stok").value);
        var deskripsi = document.getElementById("deskripsi").value;
        var foto = document.getElementById("foto").files[0];
  
        // Validasi input
        if (namaProduk === "" || harga <= 0 || stok < 0 || deskripsi === "" || !foto) {
            alert("Silakan lengkapi semua field dengan benar!");
            return;
        }
  
        // Lakukan operasi untuk menyimpan data (misalnya, mengirimkan data ke server)
        document.getElementById("formTambahProduk").submit();
  
        // Setelah operasi selesai, tutup modal
        $('#tambahProdukModal').modal('hide');
  
        // Clear form
        document.getElementById("formTambahProduk").reset();
  
        // Tampilkan pesan sukses atau lakukan operasi lanjutan
        alert("Produk berhasil disimpan!");
    }
  </script>
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
