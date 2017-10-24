<li><a href="/category/{!! $category->slug !!}">{!! $category->title !!}</a>
    @if(count($category->childs) > 0)
        <ul>
            @each('marketplace::site.layouts.elements._category_chunk', $category->childs, 'category')
        </ul>
    @endif
</li>