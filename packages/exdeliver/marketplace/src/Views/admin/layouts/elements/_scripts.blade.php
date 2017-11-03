{!! Html::script('js/app.js') !!}
{!! Html::script('admin/js/main.js') !!}
{!! Html::script('admin/js/index.js') !!}
{!! Html::script('summernote/dist/summernote.min.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@yield('js')