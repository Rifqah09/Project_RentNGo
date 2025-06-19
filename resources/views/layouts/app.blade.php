<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RentNGo - Outdoor Equipment Rental Management System">
    <meta name="author" content="RentNGo Team">

    <title>RentNGo Admin</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin') }}/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom green/nature theme overrides -->
    <style>
        :root {
            --primary: #2e7d32;
            /* Deep green */
            --primary-light: #4caf50;
            /* Medium green */
            --primary-lighter: #81c784;
            /* Light green */
            --primary-dark: #1b5e20;
            /* Dark green */
            --secondary: #8bc34a;
            /* Lime green */
            --accent: #689f38;
            /* Nature accent green */
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
        }

        .sidebar .nav-item .nav-link {
            color: rgba(255, 255, 255, 0.85);
        }

        .sidebar .nav-item .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-item.active .nav-link {
            color: white;
            font-weight: 600;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .bg-primary {
            background-color: var(--primary) !important;
        }

        .text-primary {
            color: var(--primary) !important;
        }

        .border-left-primary {
            border-left-color: var(--primary) !important;
        }

        .sidebar-brand {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand-icon i {
            color: #a5d6a7;
            /* Soft green */
        }

        .topbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            background-color: #f8f9fa !important;
        }

        .card {
            border: none;
            box-shadow: 0 0.15rem 0.5rem rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e3e6f0;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ 'dashboard' }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-mountain"></i>
                </div>
                <div class="sidebar-brand-text mx-3">RentNGo</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ 'dashboard' }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if (Auth::user()->role == 'admin')
                <!-- Admin Section -->
                <div class="sidebar-heading">
                    <i class="fas fa-crown mr-2"></i>Administrator
                </div>

                <!-- Pengaturan Umum -->
                <!-- Pengaturan Umum -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Pengaturan Umum</span>
                    </a>
                    <div id="collapseTwo" class="collapse" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pengaturan:</h6>
                            <a class="collapse-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="collapse-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            
                        </div>
                    </div>
                </li>

                <!-- Laporan Statistik -->
                {{-- <li class="nav-item">
                    <a class="nav-link" href="charts.html">
                        <i class="fas fa-fw fa-chart-line"></i>
                        <span>Laporan Statistik</span>
                    </a>
                </li> --}}

                <!-- Manajemen -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse"
                        data-target="#collapseUtilities">
                        <i class="fas fa-fw fa-tools"></i>
                        <span>Manajemen</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola:</h6>
                            <a class="collapse-item" href="{{ route('pengguna.index') }}">Pengguna</a>
                            <a class="collapse-item" href="/lihatalat">Alat Camping</a>
                            <a class="collapse-item" href="/penyewaan">Penyewaan</a>
                            <a class="collapse-item" href="/pembayaran">Pembayaran</a>
                        </div>
                    </div>
                </li>
            @elseif (Auth::user()->role == 'staff')
                <!-- Staff Section -->
                <div class="sidebar-heading">
                    <i class="fas fa-user-tie mr-2"></i>Staff
                </div>

                <!-- Manajemen -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse"
                        data-target="#collapseUtilities">
                        <i class="fas fa-fw fa-tasks"></i>
                        <span>Manajemen</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola:</h6>
                            <a class="collapse-item" href="/lihatalat">Alat Camping</a>
                            <a class="collapse-item" href="/penyewaan">Penyewaan</a>
                            <a class="collapse-item" href="/pembayaran">Pembayaran</a>
                        </div>
                    </div>
                </li>
            @elseif (Auth::user()->role == 'user')
                <!-- User Section -->
                <div class="sidebar-heading">
                    <i class="fas fa-user mr-2"></i>Pelanggan
                </div>

                <!-- Manajemen -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse"
                        data-target="#collapseUtilities">
                        <i class="fas fa-fw fa-campground"></i>
                        <span>Penyewaan</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu:</h6>
                            <a class="collapse-item" href="/lihatdantambah">Lihat Alat</a>
                            <a class="collapse-item" href="{{ route('riwayat') }}">Riwayat</a>
                            @php
                                $penyewaan = \App\Models\Penyewaan::where('user_id', auth()->id())->first();
                            @endphp
                            @if ($penyewaan)
                                <a class="collapse-item" href="{{ route('pembayaran.upload.form', $penyewaan->id) }}">
                                    Lihat Pembayaran
                                </a>
                            @else
                                <span class="text-muted collapse-item">Belum ada penyewaan</span>
                            @endif
                        </div>
                    </div>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Logout -->
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}"
                    onsubmit="return confirm('Yakin ingin logout?');">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-left"
                        style="width: 100%; border: none; background: none;">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..."
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('admin') }}/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                
                                <div class="dropdown-divider"></div>
                                {{-- <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </form> --}}
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RentNGo {{ now()->year }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin') }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin') }}/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin') }}/js/demo/chart-area-demo.js"></script>
    <script src="{{ asset('admin') }}/js/demo/chart-pie-demo.js"></script>

</body>

</html>
