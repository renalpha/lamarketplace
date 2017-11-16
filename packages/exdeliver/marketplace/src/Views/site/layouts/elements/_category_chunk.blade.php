<li class="parent-category"><a href="/category/{!! $category->slug !!}">{!! $category->title !!}</a>
    @if(count($category->childs) > 0)
        <ul style="display:none;">
            @each('marketplace::site.layouts.elements._category_chunk', $category->childs, 'category')
        </ul>
    @endif
</li>