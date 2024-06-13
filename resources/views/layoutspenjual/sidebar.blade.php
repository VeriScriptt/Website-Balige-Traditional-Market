<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/penjual">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Partiga-Tiga</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <br>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('penjual') ? 'active' : '' }}">
        <a class="nav-link" href="/penjual">
            <i class="fas fa-fw fa-user"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Profile -->
    <li class="nav-item {{ Request::is('penjual/profile') ? 'active' : '' }}">
        <a class="nav-link" href="/penjual/profile">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span></a>
    </li>

    <!-- Nav Item - Products -->
    <li class="nav-item {{ Request::is('penjual/produk') ? 'active' : '' }}">
        <a class="nav-link" href="/penjual/produk">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Produk</span></a>
    </li>

    <!-- Nav Item - Orders -->
    <li class="nav-item {{ Request::is('penjual/pesanan') ? 'active' : '' }}">
        <a class="nav-link" href="/penjual/pesanan">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Pesanan</span></a>
    </li>

    <!-- Nav Item - Reviews -->
    <li class="nav-item {{ Request::is('penjual/ulasan') ? 'active' : '' }}">
        <a class="nav-link" href="/penjual/ulasan">
            <i class="fas fa-fw fa-comment"></i>
            <span>Ulasan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <script>
        // Menangani klik pada toggler sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('accordionSidebar').classList.toggle('toggled');
        });
    </script>

</ul>
