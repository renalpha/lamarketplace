<tr style="background: #f1f1f1; "  class="disabled sub">
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
@each('marketplace::admin.modules.marketplace.categories.elements._subcategory', $category->subcategories, 'subcategory')