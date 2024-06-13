
<!-- resources/views/Layoutspenjual/tambah_produk.blade.php -->
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
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori_id">
                            @foreach($kategori as $category)
                                <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
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
