<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageName }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('') }}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/toastr/toastr.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/ekko-lightbox/ekko-lightbox.css">

  <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="{{ url('') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- jQuery -->
    {{-- <script src="{{ url('') }}/plugins/jquery/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- PDF.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.590/pdf.min.js"></script>

<!-- Lightbox library - Magnific Popup -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <!-- PDF.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.590/pdf.min.js"></script>

<!-- Lightbox library - Magnific Popup -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>


</head>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed layout-navbar-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ url('') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ url('') }}/dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ url('') }}/dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ url('') }}/dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> --}}
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                        {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header" style="white-space: pre-wrap !important;
                        font-size: 20px;
                        font-weight: bold;
                        color: #000;">{{ Auth::user()->full_name }}</span>
                        <span class="dropdown-item dropdown-header text-primary" style="white-space: pre-wrap !important;
                        font-size: 20px;
                        font-weight: bold;
                        color: #000;">({{ $dataSetting->$role }})</span>
                        <div class="dropdown-divider"></div>
                        @if ($userinfo->role == "1")
                            <a href="{{ url('') }}/profile" class="dropdown-item">
                                <i class="fas fa-user mr-2"></i> Profile
                            </a>
                            <a href="{{ url('') }}/billplz-setting" class="dropdown-item">
                                <i class="fas fa-cogs mr-2"></i> BillPlz Setting
                            </a>
                            <a href="{{ url('') }}/ninjavan-setting" class="dropdown-item">
                                <i class="fas fa-cogs mr-2"></i> NinjaVan Setting
                            </a>
                        @endif

                        <div class="dropdown-divider"></div>
                        <a href="{{ url('') }}/logout" class="dropdown-item bg-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                        </a>
                    </div>
                </li>
                <li class="nav-item" style="display:none;">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item" style="display:none;">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-dark-info">
            <!-- Brand Logo -->
            <a href="{{ url('') }}/dashboard" class="brand-link">
                <img src="{{ url('') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AMS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">



                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ url('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('user') }}" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    User/Mmber
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('subscriber/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('subscriber/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Subscriber
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">0</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="padding-left: 0px !important;">
                                <li class="nav-item">
                                    <a href="{{ url('subscriber/company') }}" class="nav-link {{ Request::is('subscriber/company') ? 'active' : '' }} {{ Request::is('subscriber/company/*') ? 'active' : '' }}">
                                        <i class="fas fa-arrow-right nav-icon"></i>
                                        <p>Company</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('subscriber/user') }}" class="nav-link {{ Request::is('subscriber/user') ? 'active' : '' }}">
                                        <i class="fas fa-arrow-right nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('subscriber/create') }}" class="nav-link {{ Request::is('subscriber/create') ? 'active' : '' }}">
                                        <i class="fas fa-arrow-right nav-icon"></i>
                                        <p>Registration</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is('billing/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('billing/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    Billing
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="padding-left: 0px !important;">
                                <li class="nav-item">
                                    <a href="{{ url('billing/new') }}" class="nav-link {{ Request::is('billing/new') ? 'active' : '' }}">
                                        <i class="fas fa-arrow-right nav-icon"></i>
                                        <p>New Billing</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('billing/complete') }}" class="nav-link {{ Request::is('billing/complete') ? 'active' : '' }}">
                                        <i class="fas fa-arrow-right nav-icon"></i>
                                        <p>Completed</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('billing/due') }}" class="nav-link {{ Request::is('billing/deu') ? 'active' : '' }}">
                                        <i class="fas fa-arrow-right nav-icon"></i>
                                        <p>Due</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('logout') }}" class="nav-link bg-danger">
                                <i class="nav-icon fas fa-sign-out-alt text-warning"></i>
                                <p>Sign Out</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('maincontent')

        <footer class="main-footer text-sm">
            <strong>Copyright &copy; 2024 <a>AMS</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ url('') }}/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ url('') }}/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{ url('') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ url('') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ url('') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ url('') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{ url('') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{ url('') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ url('') }}/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('') }}/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('') }}/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('') }}/dist/js/pages/dashboard.js"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ url('') }}/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

    <script>
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({gutterPixels: 3});
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
    <script>
        $(function () {
              $("#example2").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
              }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            });
    </script>
    <script>
        $(function() {
              var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });

              $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                  icon: 'success',
                  title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.swalDefaultInfo').click(function() {
                Toast.fire({
                  icon: 'info',
                  title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.swalDefaultError').click(function() {
                Toast.fire({
                  icon: 'error',
                  title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.swalDefaultWarning').click(function() {
                Toast.fire({
                  icon: 'warning',
                  title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.swalDefaultQuestion').click(function() {
                Toast.fire({
                  icon: 'question',
                  title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });

              $('.toastrDefaultSuccess').click(function() {
                toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
              });
              $('.toastrDefaultInfo').click(function() {
                toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
              });
              $('.toastrDefaultError').click(function() {
                toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
              });
              $('.toastrDefaultWarning').click(function() {
                toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
              });

              $('.toastsDefaultDefault').click(function() {
                $(document).Toasts('create', {
                  title: 'Toast Title',
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.toastsDefaultTopLeft').click(function() {
                $(document).Toasts('create', {
                  title: 'Toast Title',
                  position: 'topLeft',
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.toastsDefaultBottomRight').click(function() {
                $(document).Toasts('create', {
                  title: 'Toast Title',
                  position: 'bottomRight',
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.toastsDefaultBottomLeft').click(function() {
                $(document).Toasts('create', {
                  title: 'Toast Title',
                  position: 'bottomLeft',
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.toastsDefaultAutohide').click(function() {
                $(document).Toasts('create', {
                  title: 'Toast Title',
                  autohide: true,
                  delay: 750,
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.toastsDefaultNotFixed').click(function() {
                $(document).Toasts('create', {
                  title: 'Toast Title',
                  fixed: false,
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.toastsDefaultFull').click(function() {
                $(document).Toasts('create', {
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                  title: 'Toast Title',
                  subtitle: 'Subtitle',
                  icon: 'fas fa-envelope fa-lg',
                })
              });
              $('.toastsDefaultFullImage').click(function() {
                $(document).Toasts('create', {
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                  title: 'Toast Title',
                  subtitle: 'Subtitle',
                  image: '../../dist/img/user3-128x128.jpg',
                  imageAlt: 'User Picture',
                })
              });
              $('.toastsDefaultSuccess').click(function() {
                $(document).Toasts('create', {
                  class: 'bg-success',
                  title: 'Toast Title',
                  subtitle: 'Subtitle',
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.toastsDefaultInfo').click(function() {
                $(document).Toasts('create', {
                  class: 'bg-info',
                  title: 'Toast Title',
                  subtitle: 'Subtitle',
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.toastsDefaultWarning').click(function() {
                $(document).Toasts('create', {
                  class: 'bg-warning',
                  title: 'Toast Title',
                  subtitle: 'Subtitle',
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.toastsDefaultDanger').click(function() {
                $(document).Toasts('create', {
                  class: 'bg-danger',
                  title: 'Toast Title',
                  subtitle: 'Subtitle',
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
              $('.toastsDefaultMaroon').click(function() {
                $(document).Toasts('create', {
                  class: 'bg-maroon',
                  title: 'Toast Title',
                  subtitle: 'Subtitle',
                  body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
              });
            });
    </script>

@if ($errors->any())
    <script>
        $(function() {
            setTimeout(function(){
                $('#addForm').trigger('click');
            }, 10);
        });
    </script>
@endif

@if (session('success'))
<script>
    $(function() {
        var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
        setTimeout(function(){
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            })
        }, 10);
    });
</script>
@endif

@if (session('error'))
<script>
    $(function() {
        var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
        setTimeout(function(){
            Toast.fire({
                icon: "danger",
                title: "{{ session('success') }}"
            })
        }, 10);
    });
</script>
@endif

@if (session('error'))
<script>
    $(function() {
        var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
        setTimeout(function(){
            Toast.fire({
                icon: "error",
                title: "{{ session('error') }}"
            })
        }, 10);
    });
</script>
@endif

<script>
    document.getElementById('getLocationBtn').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert('Geolocation is not supported by this browser.');
        }
    });

    function showPosition(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // Do something with the latitude and longitude
        console.log('Latitude: ' + latitude + ', Longitude: ' + longitude);
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert('User denied the request for Geolocation.');
                break;
            case error.POSITION_UNAVAILABLE:
                alert('Location information is unavailable.');
                break;
            case error.TIMEOUT:
                alert('The request to get user location timed out.');
                break;
            case error.UNKNOWN_ERROR:
                alert('An unknown error occurred.');
                break;
        }
    }
</script>
<script>
    document.getElementById('captureBtn').addEventListener('click', function() {
        // Request access to the user's camera
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                // Display the camera stream in a video element
                var videoElement = document.createElement('video');
                videoElement.autoplay = true;
                videoElement.srcObject = stream;
                document.body.appendChild(videoElement);

                // Create a canvas element to capture the image
                var canvas = document.createElement('canvas');
                var context = canvas.getContext('2d');

                // Capture the image from the video stream
                videoElement.addEventListener('loadedmetadata', function() {
                    canvas.width = videoElement.videoWidth;
                    canvas.height = videoElement.videoHeight;
                    context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);

                    // Convert the captured image to base64
                    var imageData = canvas.toDataURL('image/jpeg');

                    // Display the captured image
                    var imageElement = document.createElement('img');
                    imageElement.src = imageData;
                    document.getElementById('imageContainer').appendChild(imageElement);

                    // Send the image data to the backend for storage
                    sendImageToBackend(imageData);
                });
            })
            .catch(function(err) {
                // Handle errors, such as permission denied
                console.error('Error accessing camera:', err.message);
            });
    });

    function sendImageToBackend(imageData) {
        // Send the image data to your Laravel backend
        // using AJAX or any other method
        // Example AJAX request:
        /*
        $.ajax({
            url: '/save-image',
            method: 'POST',
            data: { image: imageData },
            success: function(response) {
                console.log('Image saved successfully:', response);
            },
            error: function(xhr, status, error) {
                console.error('Error saving image:', xhr.responseText);
            }
        });
        */
    }
</script>

<script>
    var timeoutInMinutes = 1; // Set the timeout period in minutes

    var timeout = timeoutInMinutes * 60 * 1000; // Convert minutes to milliseconds

    var timer;

    function resetTimer() {
        clearTimeout(timer);
        timer = setTimeout(logout, timeout);
    }

    function logout() {
        e.preventDefault(); // Prevent form submission

        //var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            type: 'POST',
            url: '{{ url("logout-inactive") }}'
        });
        Swal.fire({
                title: "Inactive activity for 1 minute.",
                text: "You wil redirect to logout.",
                icon: "warning",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ok"
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ url('logout') }}"
            }
            });
    }

    // Reset the timer on user activity
    document.addEventListener('mousemove', resetTimer);
    document.addEventListener('keypress', resetTimer);

    // Start the timer
    resetTimer();
</script>


</body>

</html>
