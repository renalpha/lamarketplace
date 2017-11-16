<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar ps-container">
        <nav>
            <!-- start: MAIN NAVIGATION MENU -->
            <div class="navbar-title">
                <span>Main Navigation</span>
            </div>
            <ul class="main-navigation-menu">
                <li class="active open">
                    <a href="/admin/">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-home"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Dashboard </span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-settings"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> {{ trans('marketplace::elements.categories') }}</span> <i
                                        class="fa fa-arrow-circle-o-right pull-right"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/marketplace/categories/overview">
                                <span class="title"> {{ trans('marketplace::elements.overview') }} </span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/marketplace/categories/new">
                                <span class="title"> {{ trans('marketplace::elements.create') }} </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-settings"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> {{ trans('marketplace::elements.advertisements') }}</span> <i
                                        class="fa fa-arrow-circle-o-right pull-right"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/marketplace/advertisements/overview">
                                <span class="title"> {{ trans('marketplace::elements.overview') }} </span>
                            </a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="/admin/marketplace/advertisements/new">--}}
                                {{--<span class="title"> {{ trans('marketplace::elements.create') }} </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </li>
            </ul>
            <!-- end: MAIN NAVIGATION MENU -->
            <!-- start: CORE FEATURES -->
            <div class="navbar-title">
                <span>{{ trans('user.account') }}</span>
            </div>
            <ul class="folders">
                <li>
                    <a href="/admin/user/my-account">
                        <div class="item-content">
                            <div class="item-media">
                                <span class="fa-stack"> <i class="fa fa-square fa-stack-2x"></i> <i
                                            class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                            </div>
                            <div class="item-inner">
                                <span class="title"> {{ trans('marketplace::user.my-account') }} </span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/admin/user/logout">
                        <div class="item-content">
                            <div class="item-media">
                                <span class="fa-stack"> <i class="fa fa-square fa-stack-2x"></i> <i
                                            class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i> </span>
                            </div>
                            <div class="item-inner">
                                <span class="title"> {{ trans('marketplace::user.logout') }} </span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
            <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
            <div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
</div>