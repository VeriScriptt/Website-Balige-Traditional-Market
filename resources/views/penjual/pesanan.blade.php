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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('admin_assets/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                <h1 class="h3 mb-2 text-gray-800">Pesanan</h1>

                @include('../layoutspenjual/detail_pesanan')
                @include('../layoutspenjual/terima')

                <!-- Pesanan Diproses -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pesanan Diproses</h6>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemesan</th>
                                        <th>Produk Pesanan</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingOrders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>
                                            <ul>
                                                @php
                                                    $totalHarga = 0;
                                                @endphp
                                                @foreach($order->orderItems as $item)
                                                    @if($item->produk->id_user == Auth::id())
                                                        <li>{{ $item->produk->nama_produk }} ({{ $item->quantity }})</li>
                                                        @php
                                                            $totalHarga += $item->harga * $item->quantity;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>Rp.{{ number_format($totalHarga, 0, ',', '.') }}</td>
                                        <td>{{ ucfirst($order->status) }}</td>
                                        <td>
                                            <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#orderDetailModal" onclick="showOrderDetails({{ $order }})">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">Detail</span>
                                            </button>
                                                {{-- <button class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#exampleModal1">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-thumbs-up"></i>
                                                    </span>
                                                    <span class="text">Selesai</span>
                                                </button> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center">
                            {{ $pendingOrders->links() }}
                        </div>
                    </div>
                </div>

                <!-- Pesanan Lainnya -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemesan</th>
                                        <th>Produk Pesanan</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>
                                            <ul>
                                                @php
                                                    $totalHarga = 0;
                                                @endphp
                                                @foreach($order->orderItems as $item)
                                                    @if($item->produk->id_user == Auth::id())
                                                        <li>{{ $item->produk->nama_produk }} ({{ $item->quantity }})</li>
                                                        @php
                                                            $totalHarga += $item->harga * $item->quantity;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>Rp.{{ number_format($totalHarga, 0, ',', '.') }}</td>
                                        <td>{{ ucfirst($order->status) }}</td>
                                        <td>
                                            <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#orderDetailModal" onclick="showOrderDetails({{ $order }})">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">Detail</span>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center">
                            {{ $orders->links() }}
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

    <!-- Order Detail Modal -->
    <div class="modal fade" id="orderDetailModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailModalLabel">Detail Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="card-title">Nama Pembeli: <span id="orderName"></span></h5>
                    <p class="card-text">Email: <span id="orderEmail"></span></p>
                    <p class="card-text">Nomor HP: <span id="orderPhone"></span></p>
                    <p class="card-text">Status: <span id="orderStatus"></span></p>
                    <h6>Produk Pesanan:</h6>
                    <ul id="orderProducts"></ul>
                    <p class="card-text">Total Harga: Rp.<span id="orderTotalPrice"></span></p>
                    <h6>Bukti Pembayaran:</h6>
                    <img id="buktiPembayaran" src="" alt="Bukti Pembayaran" style="max-width: 50%; display: none;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
    <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin_assets/js/demo/datatables-demo.js') }}"></script>

    {{-- <script>
        function showOrderDetails(order) {
            document.getElementById('orderName').innerText = order.user.name;
            document.getElementById('orderEmail').innerText = order.user.email;
            document.getElementById('orderPhone').innerText = order.user.nomor_telepon;
            document.getElementById('orderStatus').innerText = order.status.charAt(0).toUpperCase() + order.status.slice(1);
            
            const orderProducts = document.getElementById('orderProducts');
            orderProducts.innerHTML = '';
            let totalPrice = 0;

            order.order_items.forEach(item => {
                if (item.produk.id_user === {{ Auth::id() }}) {
                    const li = document.createElement('li');
                    li.innerText = `${item.produk.nama_produk} - ${item.quantity} pcs`;
                    orderProducts.appendChild(li);
                    totalPrice += item.harga * item.quantity;
                }
            });

            const buktiPembayaran = document.getElementById('buktiPembayaran');
            if (order.bukti_transaksi) {
                buktiPembayaran.src = `/images/gambar_toko/${order.bukti_transaksi}`;
                buktiPembayaran.style.display = 'block';
            } else {
                buktiPembayaran.style.display = 'none';
            }

            document.getElementById('orderTotalPrice').innerText = totalPrice.toLocaleString('id-ID', { minimumFractionDigits: 0 });
        }
    </script> --}}
    
    <script>
        function showOrderDetails(order) {
            document.getElementById('orderName').innerText = order.user.name;
            document.getElementById('orderEmail').innerText = order.user.email;
            document.getElementById('orderPhone').innerText = order.user.nomor_telepon;
            document.getElementById('orderStatus').innerText = order.status.charAt(0).toUpperCase() + order.status.slice(1);
            
            const orderProducts = document.getElementById('orderProducts');
            orderProducts.innerHTML = '';
            let totalPrice = 0;
    
            order.order_items.forEach(item => {
                if (item.produk.id_user === {{ Auth::id() }}) {
                    const li = document.createElement('li');
                    li.innerText = `${item.produk.nama_produk} - ${item.quantity} pcs`;
                    orderProducts.appendChild(li);
                    totalPrice += item.harga * item.quantity;
                }
            });
    
            const buktiPembayaran = document.getElementById('buktiPembayaran');
            const buktiTransaksi = JSON.parse(order.bukti_transaksi);
            if (buktiTransaksi && buktiTransaksi.hasOwnProperty({{ Auth::id() }})) {
                buktiPembayaran.src = `/images/gambar_toko/${buktiTransaksi[{{ Auth::id() }}]}`;
                buktiPembayaran.style.display = 'block';
            } else {
                buktiPembayaran.style.display = 'none';
            }
    
            document.getElementById('orderTotalPrice').innerText = totalPrice.toLocaleString('id-ID', { minimumFractionDigits: 0 });
        }
    </script>
    

</body>

</html>
