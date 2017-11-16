{!! Html::script('js/app.js') !!}
{!! Html::script('admin/js/main.js') !!}
{!! Html::script('admin/js/index.js') !!}
{!! Html::script('admin/js/jquery.imageupload.js') !!}
{!! Html::script('summernote/dist/summernote.min.js') !!}
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
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

        $(function () {
            $("#sortableTable tbody").sortable({
                items: 'tr:not(.disabled)',
                opacity: 0.6, cursor: 'move', update: function () {
                    var order = $(this).sortable("serialize");
                    //console.log(order);
                    var trIds = $('#sortableTable tbody tr').map(function (i, n) {
                        return $(n).attr('title');
                    }).get().join(',');
                    $.get("/admin/marketplace/categories/reorder", {formData: trIds}, function (theResponse) {
                    });
                }
            });
        });

        (function(){
            var options = {};
            $('.js-uploader__box').uploader(options);
        }());
    });
</script>
@yield('js')