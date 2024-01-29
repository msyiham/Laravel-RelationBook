<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>
<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <!--<a href="index.html" class="logo">-->
                <!--Zoter-->
                <!--</a>-->
                <!-- Image Logo -->
                <a href="#" class="logo">
                    <img src="{{ URL::to('/') }}/user/images/relation.png" alt="" class="logo-large">
                </a>
            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="list-inline float-right mb-0">
                    <!-- User-->
                    @auth
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user mt-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-account-circle m-r-5 text-muted" style="font-size: 20pt"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>Welcome</h5>
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
                    @endauth
                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
                
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu text-center">
                    @auth
                        @role('teacher')
                        <ul class="navigation-menu text-center">
                            <li class="has-submenu ">
                                <a href="/teacher"><i class="mdi mdi-home"></i>Dashboard</a>
                            </li>
                            <li class="has-submenu ">
                                <a href="/teacher/list-name"><i class="mdi mdi-table-edit"></i>Input Nilai</a>
                            </li>
                            <li class="has-submenu">
                                <a href="/teacher/list-month"><i class="mdi mdi-book-multiple"></i>Rekap Penilaian</a>
                            </li>
                            <li class="has-submenu">
                                <a href="/teacher/list-name-evaluations"><i class="mdi mdi-rename-box"></i>Input Evaluasi</a>
                            </li>
                            <li class="has-submenu">
                                <a href="/teacher/evaluations"><i class="mdi mdi-book-multiple"></i>Rekap Evaluasi</a>
                            </li>
                        </ul>
                        @else
                            @role('student')
                                <ul class="navigation-menu text-center">
                                    <li class="has-submenu">
                                        <a href="/student"><i class="mdi mdi-home"></i>Dashboard</a>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="/student/list-month"><i class="mdi mdi-table-edit"></i>Penilaian</a>
                                    </li>
                                    <li class="has-submenu">
                                        <a href={{route('student.showEvaluation')}}><i class="mdi mdi-book-multiple"></i>Evaluasi</a>
                                    </li>
                                </ul>
                            @else
                                <ul class="navigation-menu text-center">
                                </ul>
                            @endrole
                        @endrole
                    @else
                    <ul class="navigation-menu text-center">
                        <li class="has-submenu">
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
                        </li>
                
                        <li class="has-submenu">
                            <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Daftar</a>
                        </li>
                    </ul>
                    @endauth
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->