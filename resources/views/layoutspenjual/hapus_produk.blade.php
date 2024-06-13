<!-- modal_hapus_produk.blade.php -->
<div class="modal fade" id="hapusProdukModal" tabindex="-1" role="dialog" aria-labelledby="hapusProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusProdukModalLabel">Konfirmasi Hapus Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus produk ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="hapusProduk()">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    function hapusProduk() {
        // Lakukan operasi untuk menghapus data (misalnya, mengirimkan permintaan ke server)

        // Setelah operasi selesai, tutup modal
        $('#hapusProdukModal').modal('hide');

        // Tampilkan pesan sukses atau lakukan operasi lanjutan
        alert("Produk berhasil dihapus!");
    }
</script>
