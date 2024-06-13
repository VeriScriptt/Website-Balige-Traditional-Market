<!-- resources/views/modals/add_seller_modal.blade.php -->
<div class="modal fade" id="addSellerModal" tabindex="-1" role="dialog" aria-labelledby="addSellerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSellerModalLabel">Tambah Penjual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addSellerForm" method="POST" action="{{ route('sellers.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Penjual -->
                    <div class="form-group">
                        <label for="name">Nama Penjual</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">Email Penjual</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nomor Toko -->
                    <div class="form-group">
                        <label for="nomor_toko">Nomor Toko</label>
                        <input type="text" class="form-control" id="nomor_toko" name="nomor_toko" value="{{ old('nomor_toko') }}" required>
                        @error('nomor_toko')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" required>
                        @error('nik')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama Toko -->
                    <div class="form-group">
                        <label for="nama_toko">Nama Toko</label>
                        <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="{{ old('nama_toko') }}" required autocomplete="nama_toko">
                        @error('nama_toko')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Lantai Toko -->
                    <div class="form-group">
                        <label for="lantai_toko">Lantai Toko</label>
                        <select id="lantai_toko" class="form-control" name="lantai_toko" required>
                            <option value="Lantai 1" {{ old('lantai_toko') == 'Lantai 1' ? 'selected' : '' }}>Lantai 1</option>
                            <option value="Lantai 2" {{ old('lantai_toko') == 'Lantai 2' ? 'selected' : '' }}>Lantai 2</option>
                            <option value="Balairung" {{ old('lantai_toko') == 'Balairung' ? 'selected' : '' }}>Balairung</option>
                        </select>
                        @error('lantai_toko')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-group">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="62xxxxxxxxxx" pattern="[0-9]*" inputmode="numeric" required>
                        @error('nomor_telepon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Format nomor telepon harus dimulai dengan 62 dan hanya berisi angka.</small>
                    </div>

                    <!-- Foto Toko -->
                    <div class="form-group">
                        <label for="gambar_toko">Foto Toko</label>
                        <input type="file" class="form-control" id="gambar_toko" name="gambar_toko" required>
                        @error('gambar_toko')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('nomor_telepon').addEventListener('input', function (e) {
        let value = e.target.value;
        value = value.replace(/[^0-9]/g, ''); // Hanya menerima angka
        if (!value.startsWith('62')) {
            value = '62' + value.replace(/^0+/, ''); // Hilangkan 0 di awal jika ada
        }
        e.target.value = value;
    });
</script>
