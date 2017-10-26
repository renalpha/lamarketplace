<div class="form-group">
    <label for="title">{{ trans('marketplace::elements.title') }}</label>
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="title">{{ trans('marketplace::elements.slug') }}</label>
    {!! Form::select('parent_id', \MarketplaceService::getCategories()->pluck('title','id'), null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="description">{{ trans('marketplace::elements.description') }}</label>
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit(trans('marketplace::elements.save_name', ['name' => trans('elements.category')])) !!}
</div>