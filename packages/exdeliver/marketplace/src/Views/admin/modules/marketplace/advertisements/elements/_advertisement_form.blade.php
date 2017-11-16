
@if(isset($advertisement->images) && count($advertisement->images) > 0)
    <div class="form-group">
        @foreach($advertisement->images as $image)
            <div class="thumbnail pull-left" style="width: 100px;">
                <a href="javascript:void(0)" class="pull-right" style="position: absolute"><i class="fa fa-remove"></i></a>
                <a href="/content/{!! $image->filename !!}"><img src="/content/thumb_100_{!! $image->filename !!}" alt="{!! $image->id !!}" /></a>
            </div>
        @endforeach
        <div class="clear"></div>
    </div>
@endif

<div class="form-group">
    <label for="title">{{ trans('marketplace::elements.title') }}</label>
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="title">{{ trans('marketplace::elements.category') }}</label>
    {!! Form::select('category_id', \MarketplaceService::selectCategories(['selection' => true]), \Request::get('category_id'), ['class' => 'form-control']) !!}
</div>

{{--<div class="form-group">--}}
{{--<label for="title">{{ trans('marketplace::elements.slug') }}</label>--}}
{{--{!! Form::text('slug', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="form-group">
    <label for="content">{{ trans('marketplace::elements.advertisement') }}</label>
    {!! Form::textarea('content', null, ['class' => 'form-control summernote']) !!}
</div>

<div class="form-group">
    <label for="title">{{ trans('marketplace::elements.price') }}</label>
    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
</div>

<div class="form-group">
    <label for="content">{{ trans('marketplace::elements.images') }}</label>
    {!! Form::file('files[]', null, ['class' => 'form-control']) !!} <br/>
    {!! Form::file('files[]', null, ['class' => 'form-control']) !!} <br/>
    {!! Form::file('files[]', null, ['class' => 'form-control']) !!} <br/>
    {!! Form::file('files[]', null, ['class' => 'form-control']) !!} <br/>
</div>

{!! Form::submit(trans('marketplace::elements.save_name', ['name' => trans('marketplace::elements.advertisement')]), ['class' => 'btn btn-primary']) !!}

