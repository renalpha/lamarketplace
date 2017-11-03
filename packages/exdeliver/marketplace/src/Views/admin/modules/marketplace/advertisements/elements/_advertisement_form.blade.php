<div class="form-group">
    <label for="title">{{ trans('marketplace::elements.title') }}</label>
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="title">{{ trans('marketplace::elements.category') }}</label>
    {!! Form::select('category_id', \MarketplaceService::selectCategories(['selection' => true]), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="title">{{ trans('marketplace::elements.slug') }}</label>
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="content">{{ trans('marketplace::elements.advertisement') }}</label>
    {!! Form::textarea('content', null, ['class' => 'form-control summernote']) !!}
</div>

{!! Form::submit(trans('marketplace::elements.save_name', ['name' => trans('marketplace::elements.advertisement')]), ['class' => 'btn btn-primary']) !!}