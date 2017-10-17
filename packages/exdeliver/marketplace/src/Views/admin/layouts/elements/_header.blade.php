<header class="navbar navbar-default navbar-static-top">
    <!-- start: NAVBAR HEADER -->
    <div class="navbar-header">
        <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" data-toggle-class="app-slide-off"
           data-toggle-target="#app" data-toggle-click-outside="#sidebar">
            <i class="ti-align-justify"></i>
        </a>
        <a class="navbar-brand" href="index.html">
            <img src="assets/images/logo.png" alt="EXDELIVER">
        </a>
        <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed"
           data-toggle-target="#app">
            <i class="ti-align-justify"></i>
        </a>
        <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse"
           href=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="ti-view-grid"></i>
        </a>
    </div>
    <!-- end: NAVBAR HEADER -->
    <!-- start: NAVBAR COLLAPSE -->
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-right" style="height: auto;">

            <li class="dropdown current-user">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                     <span class="username">{!! \Auth::user()->name !!} <i
                                class="ti-angle-down"></i></span>
                </a>
                <ul class="dropdown-menu dropdown-dark">
                    <li>
                        <a href="pages_user_profile.html">
                            My Profile
                        </a>
                    </li>

                    <li>
                        <a hef="pages_messages.html">
                            My Messages (3)
                        </a>
                    </li>
                    <li>
                        <a href="login_signin.html">
                            Log Out
                        </a>
                    </li>
                </ul>
            </li>
            <!-- end: USER OPTIONS DROPDOWN -->
        </ul>
    </div>

</header>