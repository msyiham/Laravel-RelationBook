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
                    <img src="{{ URL::to('/') }}/images/logo.png" alt="" class="logo-large" height="50 dvh">
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

                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->