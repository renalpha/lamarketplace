<div class="btn-group">
    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
        {!! trans('marketplace::elements.manage') !!} <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
        <li role="presentation" class="dropdown-header">
            <a href="/admin/marketplace/advertisements/edit/{!! $advertisement->id !!}">{!! trans('marketplace::elements.edit') !!}</a>
        </li>
        <li role="presentation" class="dropdown-header">
            <a href="/admin/marketplace/advertisements/remove/{!! $advertisement->id !!}">
                {!! trans('marketplace::elements.delete') !!}
            </a>
        </li>
    </ul>
</div>