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
                    {{-- <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Masukkan harga produk" value="{{ old('harga') }}">
                        @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Masukkan harga produk" value="{{ old('harga') }}" min="0">
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
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori_id">
                            @foreach($kategori as $category)
                                <option value="{{ $category->kategori_id }}">{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
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

    <script>
        function simpanProduk() {
            // Ambil nilai input
            var namaProduk = document.getElementById("namaProduk").value;
            var harga = parseFloat(document.getElementById("harga").value);
            var stok = parseInt(document.getElementById("stok").value);
            var deskripsi = document.getElementById("deskripsi").value;
            var foto = document.getElementById("foto").files[0];
            var kategori_id = document.getElementById("kategori").value; // Get kategori_id value
    
            // Validasi input
            if (namaProduk === "" || harga <= 0 || stok < 0 || deskripsi === "" || !foto || !kategori_id) {
                alert("Silakan lengkapi semua field dengan benar!");
                return;
            }
    
            // Assign kategori_id value to a hidden input field
            var hiddenInput = document.createElement("input");
            hiddenInput.setAttribute("type", "hidden");
            hiddenInput.setAttribute("name", "kategori_id");
            hiddenInput.setAttribute("value", kategori_id);
            document.getElementById("formTambahProduk").appendChild(hiddenInput);
    
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
    <script>
        document.getElementById('harga').addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove any non-numeric characters, including minus, plus, multiplication, and division signs
            value = value.replace(/[^\d]/g, '');
            e.target.value = value;
        });
        document.getElementById('stok').addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove any non-numeric characters, including minus, plus, multiplication, and division signs
            value = value.replace(/[^\d]/g, '');
            e.target.value = value;
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
