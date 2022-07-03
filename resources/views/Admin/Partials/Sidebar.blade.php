<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL::to('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-server"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SP K-Nearest Neighbor</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>
    <!-- Nav Item - Data Penyakit -->
    <li class="nav-item {{ Request::segment(1) === 'data-penyakit' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('data-penyakit') }}">
            <i class="fas fa-viruses"></i>
            <span>Data Penyakit</span>
        </a>
    </li>
    <!-- Nav Item - Data Gejala -->
    <li class="nav-item {{ Request::segment(1) === 'data-gejala' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('data-gejala') }}">
            <i class="fas fa-hand-holding-medical"></i>
            <span>Data Gejala</span>
        </a>
    </li>
    <!-- Nav Item - Data Basis Pengetahuan -->
    <li class="nav-item {{ Request::segment(1) === 'data-basis-pengetahuan' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('data-basis-pengetahuan') }}">
            <i class="fas fa-user-md"></i>
            <span>Data Basis Pengetahuan</span>
        </a>
    </li>
    <!-- Nav Item - Data Riwayat Kasus -->
    <li class="nav-item {{ Request::segment(1) === 'data-riwayat-kasus' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('data-riwayat-kasus') }}">
            <i class="fas fa-file-medical"></i>
            <span>Data Riwayat Kasus</span>
        </a>
    </li>
    <!-- Nav Item - Data Riwayat Pasien -->
    <li class="nav-item {{ Request::segment(1) === 'data-riwayat-pasien' ? 'active' : null }}">
        <a class="nav-link" href="{{ URL::to('data-riwayat-pasien') }}">
            <i class="fas fa-history"></i>
            <span>Data Riwayat Pasien</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
