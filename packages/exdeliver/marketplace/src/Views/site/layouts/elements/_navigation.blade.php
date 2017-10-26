<div class="row">
    <div class="col-md-12">
        <h1 class="pull-left purple namesoftware">{{ trans('marketplace::elements.marketplace') }}</h1>

        <nav class="navbar navbar-default">
            <div class="container-fluid" style="padding-right: 0;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse" style="padding-right: 0;">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="/advertisement/new">Advertentie plaatsen</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if(\Auth::check())
                                    <li><a href="/user/my-account">Account</a></li>
                                    <li><a href="/user/logout">Uitloggen</a></li>
                                @else
                                    <li><a href="/user/login">Inloggen</a></li>
                                    <li><a href="/user/register">Aanmelden</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right search-nav">
                        <li class="active">
                            @include('marketplace::site.layouts.elements._search')
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    </div>
    <div class="col-md-12">
        <hr class="purple"/>
    </div>
</div>
