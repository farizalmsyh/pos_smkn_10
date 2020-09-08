<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      List Dashboard Feature
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if(Auth::user()->hak_akses == 'superadmin')
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Master</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Master Components:</h6>
          <a class="collapse-item" href="{{route('profil')}}">Informasi Toko</a>
          <a class="collapse-item" href="{{route('user')}}">Daftar Pengguna</a>
        </div>
      </div>
    </li>
    @endif

    <!-- Nav Item - Utilities Collapse Menu -->
    @if(Auth::user()->hak_akses != 'gudang')
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('kasir-transaksi')}}" >
        <i class="fas fa-fw fa-wrench"></i>
        <span>Kasir</span>
      </a>
    </li>
    @endif

    @if(Auth::user()->hak_akses != 'kasir')
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Inventory</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Inventory Components:</h6>
          <a class="collapse-item" href="{{route('master-produk')}}">Master Produk</a>
          <a class="collapse-item" href="{{route('stok-minimum')}}">Stok Minimum</a>
          <a class="collapse-item" href="{{route('master-konfigurasi')}}">Master Konfigurasi</a>
        </div>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseReport">
        <i class="fas fa-fw fa-file"></i>
        <span>Laporan</span>
      </a>
      <div id="collapseReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Report Components:</h6>
          <a class="collapse-item" href="{{route('produk-in')}}">Lap. Barang Masuk</a>
          <a class="collapse-item" href="{{route('produk-out')}}">Lap. Barang Keluar</a>
          <a class="collapse-item" href="{{route('report-bahan')}}">Bahan-Bahan</a>
          <a class="collapse-item" href="{{route('sales-day')}}">X-Sales-Day</a>
        </div>
      </div>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
      Addons
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Login Screens:</h6>
          <a class="collapse-item" href="login.html">Login</a>
          <a class="collapse-item" href="register.html">Register</a>
          <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Other Pages:</h6>
          <a class="collapse-item" href="404.html">404 Page</a>
          <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
      </div>
    </li> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>