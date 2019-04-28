<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-warehouse"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI INVENTARIS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pengguna
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed pb-0" href="#">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Admin</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed pb-0" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Anggota</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed pb-0" href="<?= base_url('asset') ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Asset</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed pb-0" href="<?= base_url('barang') ?>">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Detail Barang</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed pb-0" href="<?= base_url('kategori') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Kategori</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed pb-0" href="test_enkripsi">
            <i class="fab fa-fw fa-keycdn"></i>
            <span>Enkripsi</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed pb-0" href="#">
            <i class="fas fa-fw fa-store"></i>
            <span>Penjualan</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed pb-0" href="#">
            <i class="fas fa-fw fa-file-pdf"></i>
            <span>Laporan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block my-3">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->