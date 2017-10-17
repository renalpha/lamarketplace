<!DOCTYPE html>
@include('marketplace::admin.layouts.elements._head')
<body>

<div id="app">
    @include('marketplace::admin.layouts.elements._sidebar')
    <div class="app-content">
        @include('marketplace::admin.layouts.elements._content')
    </div>
</div>

@include('marketplace::admin.layouts.elements._scripts')
</body>
</html>