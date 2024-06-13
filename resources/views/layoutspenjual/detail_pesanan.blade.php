<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (other head content) ... -->
</head>

<body id="page-top">
    <!-- ... (other body content) ... -->

    <div class="modal fade" id="detailPesananModal" tabindex="-1" role="dialog" aria-labelledby="detailPesananModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPesananModalLabel">Detail Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Pemesan</th>
                                <th>Produk Pesanan</th>
                                <th>Harga Produk</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Alamat Pembeli</th>
                                <th>Kontak Pembeli</th>
                                <th>Bukti Transaksi</th>
                            </tr>
                        </thead>
                        <tbody id="detailPesananTableBody">
                            <!-- Rows will be dynamically inserted here -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ... (other scripts) ... -->

    <script>
        function showOrderDetails(order) {
            const tableBody = document.getElementById('detailPesananTableBody');
            tableBody.innerHTML = ''; // Clear the table body

            let totalHarga = 0;

            order.order_items.forEach(item => {
                if (item.produk.id_user === {{ Auth::id() }}) {
                    const row = `
                        <tr>
                            <td>${order.id}</td>
                            <td>${order.user.name}</td>
                            <td>${item.produk.nama_produk}</td>
                            <td>${item.harga}</td>
                            <td>${item.quantity}</td>
                            <td>${item.harga * item.quantity}</td>
                            <td>${order.user.alamat}</td>
                            <td>${order.user.nomor_telepon}</td>
                            <td><img src="{{ asset('admin_assets/img/') }}/${item.produk.bukti_transaksi}" style="max-width: 100px;" /></td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                    totalHarga += item.harga * item.quantity;
                }
            });
        }
    </script>
</body>

</html>
    