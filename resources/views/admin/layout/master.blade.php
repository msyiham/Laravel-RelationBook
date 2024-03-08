<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ URL::to('/') }}/user/images/custom-logo.png">

        <!-- jvectormap -->
        <link href="{{ URL::to('/') }}/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
        <link href="{{ URL::to('/') }}/plugins/fullcalendar/vanillaCalendar.css" rel="stylesheet" type="text/css"  />
        
        <link href="{{ URL::to('/') }}/plugins/morris/morris.css" rel="stylesheet">

        <link href="{{ URL::to('/') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('/') }}/css/icons.css" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('/') }}/css/style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <!-- DataTables -->
        <link href="{{ URL::to('/') }}/user/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ URL::to('/') }}/user/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!--<a href="index.html" class="logo"><i class="mdi mdi-assistant"></i>Zoter</a>-->
                        <a href="index.html" class="logo">
                            <img src="{{ URL::to('/') }}/images/Logo-Black.png" alt="" class="logo-large">
                        </a>
                    </div>
                </div>
                <div class="sidebar-inner niceScrollleft">
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="/admin" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href={{route('admin.users')}} class="waves-effect">
                                    <i class="fas fa-user"></i>
                                    <span>User</span>
                                </a>
                            </li>
                            <li>
                                <a href={{route('admin.school.index')}} class="waves-effect">
                                    <i class="fas fa-school"></i>
                                    <span>Sekolah</span>
                                </a>
                            </li>
                            <li>
                                <a href={{route('admin.class-room.index')}} class="waves-effect">
                                    <i class="fas fa-users"></i>
                                    <span>Kelas</span>
                                </a>
                            </li>
                            <li>
                                <a href={{route('admin.indicator.index')}} class="waves-effect">
                                    <i class="fas fa-book"></i>
                                    <span>Aspek Perkembangan</span>
                                </a>
                            </li>
                            <li>
                                <a href={{route('admin.information.index')}} class="waves-effect">
                                    <i class="fas fa-info"></i>
                                    <span>Information</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                       <i class="mdi mdi-account-circle" style="font-size: 24px;"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Halo Admin</h5>
                                        </div>
                                        <a class="dropdown-item" href="/profile"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    <i class="mdi mdi-logout m-r-5 text-muted"></i> {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </a>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="float-left">
                                    <button class="button-menu-mobile open-left waves-light waves-effect">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                </li>                                
                            </ul>

                            <div class="clearfix"></div>

                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">
                            @yield('content')
                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2024 Zoter by Pengembang.
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="{{ URL::to('/') }}/js/jquery.min.js"></script>
        <script src="{{ URL::to('/') }}/js/popper.min.js"></script>
        <script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>
        <script src="{{ URL::to('/') }}/js/modernizr.min.js"></script>
        <script src="{{ URL::to('/') }}/js/detect.js"></script>
        <script src="{{ URL::to('/') }}/js/fastclick.js"></script>
        <script src="{{ URL::to('/') }}/js/jquery.blockUI.js"></script>
        <script src="{{ URL::to('/') }}/js/waves.js"></script>
        <script src="{{ URL::to('/') }}/js/jquery.nicescroll.js"></script>

        <script src="{{ URL::to('/') }}/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        
        <script src="{{ URL::to('/') }}/plugins/skycons/skycons.min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/fullcalendar/vanillaCalendar.js"></script>
        
        <script src="{{ URL::to('/') }}/plugins/raphael/raphael-min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/morris/morris.min.js"></script> 
         
        <script src="{{ URL::to('/') }}/pages/dashborad.js"></script>

        <!-- App js -->
        <script src="{{ URL::to('/') }}/js/app.js"></script>

        <!-- Required datatable js -->
        <script src="{{ URL::to('/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="{{ URL::to('/') }}/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/datatables/jszip.min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/datatables/pdfmake.min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/datatables/vfs_fonts.js"></script>
        <script src="{{ URL::to('/') }}/plugins/datatables/buttons.html5.min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/datatables/buttons.print.min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="{{ URL::to('/') }}/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="{{ URL::to('/') }}/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
        <script type="text/javascript">
            $('#summernote').summernote({
                height: 200
            });
        </script>
        <!-- Datatable init js -->
        <script src="{{ URL::to('/') }}/pages/datatables.init.js"></script> 
        <script>
            $(document).ready(function() {
                $('#datatable2').DataTable();  
            } );
        </script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
            new DataTable('table.display');
        </script>
    </body>
</html>