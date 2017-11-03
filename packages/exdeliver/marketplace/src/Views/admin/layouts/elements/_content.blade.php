<div class="app-content">
    @include('marketplace::admin.layouts.elements._header')
    <!-- end: TOP NAVBAR -->
    <div class="main-content">
        <div class="wrap-content container" id="container">
            <!-- start: DASHBOARD TITLE -->
            <section id="page-title" class="padding-top-15 padding-bottom-15">
                <div class="row">
                    <div class="col-sm-7">
                        @yield('title')
                    </div>
                </div>
            </section>
            <!-- end: DASHBOARD TITLE -->
            <!-- start: FEATURED BOX LINKS -->
            <div class="container-fluid container-fullw bg-white">
                @include('marketplace::admin.layouts.elements._status_messages')
                @yield('content')
            </div>
        </div>
    </div>
</div>