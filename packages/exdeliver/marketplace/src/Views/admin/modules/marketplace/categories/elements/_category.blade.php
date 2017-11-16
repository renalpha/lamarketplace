<tr title="{!! $category->id !!}">

    <td>
        <div>
            <table class="table">
                <tr class="disabled">
                    <td>
                        {!! $category->id !!}
                    </td>
                    <td>
                        <a href="/category/{!! $category->slug !!}" target="_blank">{!! $category->title !!}</a>
                    </td>
                    <td>
                        {!! count($category->advertisements) !!}
                    </td>
                    <td>
                        {!! date('d-m-Y H:i', strtotime($category->created_at)) !!}
                    </td>
                    <td>
                        {!! date('d-m-Y H:i', strtotime($category->created_at)) !!}
                    </td>
                    <td>
                        @include('marketplace::admin.modules.marketplace.categories.elements._manage_btns')
                    </td>
                </tr>
                @each('marketplace::admin.modules.marketplace.categories.elements._subcategory', $category->subcategories, 'category')
            </table>

        </div>
    </td>

</tr>
