<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Ayodya Pala</title>
    <meta content='width=device-width, initial-scale=1.0' name='viewport' />
    <link rel="icon" href="{{ asset('Atlantis-Lite/assets/img/Layer1001.svg') }}" type="image/x-icon" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <style>
        .sidebar.sidebar-style-2 .nav.nav-primary>.nav-item.active>a {
            background: #1572e8 !important;
            /* box-shadow: 4px 4px 10px 0 rgba(0, 0, 0, .1), 4px 4px 15px -5px rgba(21, 114, 232, .4) !important; */
        }

        .sidebar.sidebar-style-2 .nav.nav-purple>.nav-item.active>a .caret,
        .sidebar.sidebar-style-2 .nav.nav-purple>.nav-item.active>a i,
        .sidebar.sidebar-style-2 .nav.nav-purple>.nav-item.active>a p,
        .sidebar.sidebar-style-2 .nav.nav-purple>.nav-item.active>a span {
            color: #fff !important;
        }

        @media (max-width: 1300px) {
            .kekanan {
                width: 100%;
                overflow-x: scroll;
            }
        }

    </style>

    <!-- Fonts and icons -->
    <script src="{{ asset('Atlantis-Lite/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ["{{ asset('Atlantis-Lite/assets/css/fonts.min.css') }}"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('Atlantis-Lite/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Atlantis-Lite/assets/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('Atlantis-Lite/assets/css/demo.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" style="background: #7a74fc">
                <a href="/dashboard" class="logo">
                    <img src="{{ asset('Atlantis-Lite/assets/img/Layer1001.svg') }}" alt="navbar brand"
                        class="navbar-brand " style="height:50px; width:50px ;">
                    <h1 style="color: white; height:50px;" class="navbar-brand ">Ayodya Pala</h1>

                </a>



                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" style="background: #6C63FF">

                <div class="container-fluid">

                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('/' . Auth::user()->foto) }}" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img
                                                    src="{{ asset('/' . Auth::user()->foto) }}" alt="image profile"
                                                    class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p><a href=""
                                                    class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="route('logout')"
                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                <i class="fas fa-sign-out-alt me-2"></i>
                                                Logout
                                            </a>
                                        </form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">

            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-primary">
                        <li
                            class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="/dashboard">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        @if (Auth::user()->role == 'Cabang')
                            <li
                                class="nav-item {{ request()->is('admin/siswa*') || request()->is('admin/juri*') || request()->is('admin/cabang*') ? 'active submenu' : '' }}">
                                <a data-toggle="collapse" href="#admin" class="collapsed" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                    <p>Data Siswa</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->is('admin/siswa*') || request()->is('admin/juri*') || request()->is('admin/cabang*') ? 'show' : '' }}"
                                    id="admin">
                                    <ul class="nav nav-collapse">
                                        <li class="nav-item {{ request()->is('admin/siswa*') ? 'active' : '' }}">
                                            <a href="/admin/siswa">
                                                <span class="sub-item">Data Siswa</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('admin/juri*') ? 'active' : '' }}">
                                            <a href="/admin/juri">
                                                <span class="sub-item">Data Juri</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('admin/cabang*') ? 'active' : '' }}">
                                            <a href="/admin/cabang">
                                                <span class="sub-item">Data Cabang</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'admin')
                            <li
                                class="nav-item {{ request()->is('admin/siswa*') || request()->is('admin/juri*') || request()->is('admin/cabang*') ? 'active submenu' : '' }}">
                                <a data-toggle="collapse" href="#admin" class="collapsed" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                    <p>Data Master</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->is('admin/siswa*') || request()->is('admin/juri*') || request()->is('admin/cabang*') ? 'show' : '' }}"
                                    id="admin">
                                    <ul class="nav nav-collapse">
                                        <li class="nav-item {{ request()->is('admin/siswa*') ? 'active' : '' }}">
                                            <a href="/admin/siswa">
                                                <span class="sub-item">Data Siswa</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('admin/juri*') ? 'active' : '' }}">
                                            <a href="/admin/juri">
                                                <span class="sub-item">Data Juri</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('admin/cabang*') ? 'active' : '' }}">
                                            <a href="/admin/cabang">
                                                <span class="sub-item">Data Cabang</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'admin' || 'juri')
                            <li
                                class="nav-item {{ request()->is('admin/nilai*') || request()->is('admin/vokal*') || request()->is('admin/sinopsis*') ? 'active submenu' : '' }}">
                                <a data-toggle="collapse" href="#nilai" class="collapsed" aria-expanded="false">
                                    <i class="fas fa-table"></i>
                                    <p>Data Nilai</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->is('admin/nilai*') || request()->is('admin/vokal*') || request()->is('admin/sinopsis*') ? 'show' : '' }}"
                                    id="nilai">
                                    <ul class="nav nav-collapse">
                                        <li class="nav-item {{ request()->is('admin/nilai*') ? 'active' : '' }}">
                                            <a href="/admin/nilai">
                                                <span class="sub-item">Nilai
                                                    Tari</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('admin/vokal*') ? 'active' : '' }}">
                                            <a href="/admin/vokal">
                                                <span class="sub-item">Nilai
                                                    Vokal</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request()->is('admin/sinopsis*') ? 'active' : '' }}">
                                            <a href="/admin/sinopsis">
                                                <span class="sub-item">Nilai
                                                    Sinopsis</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item {{ request()->is('sertifikat*') ? 'active' : '' }}">
                                <a href="/sertifikat">
                                    <i class="fas fa-certificate"></i>
                                    <p>Sertifikat</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item {{ request()->is('admin/undian') ? 'active' : '' }}">
                            <a href="/admin/undian">
                                <i class="fas fa-ticket-alt"></i>
                                <p>Undian</p>
                            </a>
                        </li> --}}
                            <li class="nav-item {{ request()->is('admin/tarian') ? 'active' : '' }}">
                                <a href="/admin/tarian">
                                    <i class="fas fa-ticket-alt"></i>
                                    <p>Tarian</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('admin/layout*') ? 'active' : '' }}">
                                <a href="/admin/layout">
                                    <i class="fas fa-image"></i>
                                    <p>Layout</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                @yield('main')
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    {{-- <script src="{{ asset('Atlantis-Lite/assets/js/core/jquery.3.2.1.min.js')}}"></script> --}}
    <script src="{{ asset('Atlantis-Lite/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('Atlantis-Lite/assets/js/core/bootstrap.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('Atlantis-Lite/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('Atlantis-Lite/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}">
    </script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('Atlantis-Lite/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('Atlantis-Lite/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Atlantis JS -->
    <script src="{{ asset('Atlantis-Lite/assets/js/atlantis.min.js') }}"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{ asset('Atlantis-Lite/assets/js/setting-demo2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});

            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');

            });
        });
    </script>
    @yield('jquery')
</body>

</html>
