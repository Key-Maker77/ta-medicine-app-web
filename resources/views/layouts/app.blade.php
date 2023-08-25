<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Klinik Semua Bisa Sehat</title>

    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/30720bda94.js" crossorigin="anonymous"></script>
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- <div style="position: fixed; width: 200px;"> -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Klinik Semua Bisa Sehat</div>
            </a>
            <br>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="/home">
                    <i class="fa-solid fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Kelola Administrasi
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kelolaTabib.index') }}">
                    <i class="fa-solid fa-user-doctor"></i>
                    <span>Daftar Tabib Aktif</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tabibnonaktif">
                    <i class="fa-solid fa-user-doctor"></i>
                    <span>Daftar Tabib Tidak Aktif</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kelolaPengobatan.index') }}">
                    <i class="fa-solid fa-notes-medical"></i>
                    <span>Daftar Pengobatan</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Kelola Pemesanan
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kelolaPemesanan.index') }}">
                    <i class="fa-solid fa-file-lines"></i>
                    <span>Pemesanan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pesananditerima">
                    <i class="fa-solid fa-check-to-slot"></i>
                    <span>Pesanan Diterima</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pesananditolak">
                    <i class="fa-solid fa-calendar-xmark"></i>
                    <span>Pesanan Ditolak</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Pengguna
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/penggunaadmin">
                    <i class="fa-solid fa-user"></i>
                    <span>Admin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/penggunapasien">
                    <i class="fa-solid fa-users-line"></i>
                    <span>Pasien</span></a>
            </li>
            <!-- </div> -->
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}&nbsp <i class="fas fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/login" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                @yield('content')
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Klinik Semua Bisa Sehat 2023</span>
                    </div>
                </div>
            </footer>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- coding logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">keluar dari aplikasi?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Logout" jika kamu ingin keluar.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>
        <script src="{{asset('template/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"></script>
        <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>

        <script>
            // Attach event listener to the delete form
            document.addEventListener('DOMContentLoaded', function() {
                const deleteForm = document.querySelector('.delete-form');
                const confirmDeleteButton = document.getElementById('confirmDeleteButton');

                deleteForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    $('#deleteConfirmationModal').modal('show');
                });

                confirmDeleteButton.addEventListener('click', function() {
                    deleteForm.submit();
                });
            });
        </script>

<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
    


</body>

</html>
