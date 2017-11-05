<div class="form-group">
    <label for="title">{{ trans('marketplace::elements.title') }}</label>
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="title">{{ trans('marketplace::elements.parent') }}</label>
    {!! Form::select('parent_id', \MarketplaceService::selectCategories(['selection' => true]), null, ['class' => 'form-control']) !!}
</div>
{{--<div class="form-group">--}}
    {{--<label for="title">{{ trans('marketplace::elements.slug') }}</label>--}}
    {{--{!! Form::text('slug', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}
<div class="form-group">
    <label for="description">{{ trans('marketplace::elements.description') }}</label>
    {!! Form::textarea('description', null, ['class' => 'form-control summernote']) !!}
</div>
<div class="form-group">
    {!! Form::submit(trans('marketplace::elements.save_name', ['name' => trans('marketplace::elements.category')])) !!}
</div>