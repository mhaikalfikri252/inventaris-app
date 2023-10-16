<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <div class="row justify-content-center">
            <h5>SIANAS</h5>
            <h6 class="brand-text">(Sistem Informasi Aset Nasional)</h6>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/user.png') }}" alt="User Image" style="width: 40px; height: 40px;">
            </div>
            <div class="col">
                <a style="color: lightgray; font-size: 90%" class="d-block">
                    {{ auth()->user()->username }}</a>
                <a style="color: lightgray; font-size: 90%" class="d-block">SOS
                    {{ auth()->user()->city->city_name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('asset.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Daftar Aset
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('writeoff.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Aset Write Off
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inventory.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Daftar Inventaris
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('borrow.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Peminjaman Aset
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
