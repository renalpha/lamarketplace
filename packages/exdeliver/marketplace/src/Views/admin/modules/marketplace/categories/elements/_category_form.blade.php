<div class="input-group">
    <label for="title">{{ trans('category.title') }}</label>
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="input-group">
    <label for="title">{{ trans('category.title') }}</label>
    {!! Form::select('parent_id', \MarketplaceService::getCategories()->pluck('name','id'), null, ['class' => 'form-control']) !!}
</div>
<div class="input-group">
    <label for="description">{{ trans('category.description') }}</label>
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="input-group">
    {!! Form::submit(trans('elements.save_name', ['name' => trans('elements.category')])) !!}
</div>