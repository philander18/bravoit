<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/ci-bravo/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-2">BRAVO IT 2023</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
        <i class="fas fa-fw fa-user-shield"></i>
        <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('games1') ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Games 1</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('games2') ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Games 2</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('games3') ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Games 3</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>