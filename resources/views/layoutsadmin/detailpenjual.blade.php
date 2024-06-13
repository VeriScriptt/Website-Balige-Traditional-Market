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
                    <label class="text-dark">Foto:</label>
                    <img id="modalFoto" src="" alt="Foto Anda" style="width: 200px">
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

<script>
    $('#detailpenjualModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id');
        var name = button.data('name');
        var toko = button.data('toko');
        var kios = button.data('kios');
        var lantai = button.data('lantai');
        var email = button.data('email');
        var telepon = button.data('telepon');
        var tgllahir = button.data('tgllahir');
        var foto = button.data('foto');

        // Update the modal's content.
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
