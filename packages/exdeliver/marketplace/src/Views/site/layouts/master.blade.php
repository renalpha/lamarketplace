<!DOCTYPE html>
<!--[if IE 9 ]>
<html lang="en" class="no-js ie9">
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <title>MARKETPLACE</title>
    <meta charset="utf-8"/>
    <meta name="author" content="EXdeliver"/>
    <meta name="description" content="Marketplace software - powered by EXdeliver"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta name="keywords" content="EXdeliver">

    <meta property="og:title" content="Marketplace - powered by EXdeliver"/>
    <meta property="og:type" content="article"/>
    <meta property="og:description" content="Marketplace - powered by EXdeliver">

    <meta property="og:url" content="https://marketplace.nl"/>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="https://marketplace.nl/">
    <meta name="twitter:title" content="Marketplace - powered by EXdeliver">
    <meta name="twitter:description" content="MArketplace - powered by EXdeliver">

    <meta name="csrf-token" content="{!! csrf_token() !!}">
    {!! Html::style('site/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('css/app.css') !!}
    {!! Html::style('site/css/style.css') !!}
    {!! Html::script('jquery/dist/jquery.min.js') !!}
    {!! Html::script('site/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::style('summernote/dist/summernote.css') !!}
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center" style="margin-top: 20px;">
            <img src="/site/images/grafifix.png" alt="grafi-fix" class="img-responsive"/>
        </div>
    </div>
    @include('marketplace::site.layouts.elements._navigation')
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('marketplace::site.layouts.elements._breadcrumb')
        </div>
    </div>
</div>

@include('marketplace::site.layouts.elements._status_messages')

@yield('content')

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy; EXdeliver V.O.F. Marketplace Software - Licensed MIT</p>
            </div>
        </div>
    </div>
</footer>
{!! Html::script('summernote/dist/summernote.min.js') !!}
<script type="text/javascript">
    $(document).ready(function () {

        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
        });

        $(".parent-category").mouseenter(function(event)
        {
            event.stopPropagation();
            $(this).find('ul').toggle();
        }).mouseleave(function(event)
        {
            event.stopPropagation();2
            $(this).find('ul').toggle();
        });
    });
</script>
</body>
</html>