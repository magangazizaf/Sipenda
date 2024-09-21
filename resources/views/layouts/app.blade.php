<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME', 'PBL IK-TI') }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('') }}plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    @stack('css')
    <link rel="stylesheet" href="{{ asset('') }}dist/css/adminlte.min.css">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto ">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle flex items-center space-x-2" data-toggle="dropdown">
                        <img src="../../dist/img/user2-160x160.jpg" class="user-image rounded-full" style="box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.4);" alt="User Image">
                        <span class="hidden md:inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="user-header bg-info flex flex-col items-center justify-center">
                            <img src="../../dist/img/user2-160x160.jpg" class="rounded-full shadow-lg mb-2" alt="User Image">
                            <p class="text-white text-center">
                                {{ Auth::user()->name }}
                                <small class="block">Politeknik Negeri Semarang</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="{{ route('profil.index') }}" class="btn btn-default">Profil</a>
                            <a href="#" class="btn btn-default btn-flat float-right" data-toggle="modal" data-target="#modal-logout">
                                <i class="fas fa-sign-out-alt"></i> <span>Keluar</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="modal fade" id="modal-logout" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="modal-body text-center">
                            <h5>Apakah anda ingin keluar ?</h5>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default btn-flat"
                                data-dismiss="modal">Tidak</button>
                            <a class="btn btn-sm btn-info btn-flat float-right" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            this.closest('form').submit();"><span>Ya,
                                    Keluar</span></a>
                        </div>
                    </form>
                </div>

            </div>

        </div>

        <aside class="main-sidebar main-sidebar-custom sidebar-dark-info elevation-4">
            <a href="
                    @if (Auth::user()->hasRole('kaprodi'))
                        {{ route('dashboard.kaprodi') }}
                    @elseif (Auth::user()->hasRole('superadmin'))
                        {{ route('dashboard.superadmin') }}
                    @elseif (Auth::user()->hasRole('mahasiswa'))
                        {{ route('dashboard.mahasiswa') }}
                    @elseif (Auth::user()->hasRole('dosen'))

                        @php
                            $dosen = Auth::user()->dosen; // Ambil relasi dosen dari user yang sedang login
                        @endphp

                        @if ($dosen->kelas_id)
                            {{ route('dashboard.dosen.wali_kelas') }}  
                        @else
                            {{ route('dashboard.dosen') }}  
                        @endif

                    @else
                    {{ route('home') }}
                    @endif
                " class="brand-link">
                <img src="{{ asset('') }}dist/img/logo-polines.png" alt="Logo Polines"
                    class="brand-image elevation-3" style="opacity: .8">
                <span
                    class="brand-text font-weight-light "><strong>{{ env('APP_NAME', 'PBL IK-TI Polines') }}</strong></span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    @include('layouts.sidebar')
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

    </div>
    @vite('resources/js/custom.js')
    <script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('') }}plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('') }}plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    @stack('js')
    <script src="{{ asset('') }}dist/js/adminlte.min.js"></script>
    <script>
        $(function() {
            $("#datatable-main").DataTable({
                "responsive": true,
                lengthMenu: [
                    [50, 100, 200, -1],
                    [50, 100, 200, 'All']
                ],
                pageLength: 50,
                //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#datatable-main_wrapper .col-md-6:eq(0)');

            $('#datatable-sub').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $('.confirm-button').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal({
                    title: `Hapus data`,
                    icon: "warning",
                    buttons: {
                        confirm: {
                            text: 'Ya'
                        },
                        cancel: 'Tidak'
                    },
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <livewire:scripts />
</body>

</html>