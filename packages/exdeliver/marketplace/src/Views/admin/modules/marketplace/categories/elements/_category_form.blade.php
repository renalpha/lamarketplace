<div class="input-group">
    <label for="title">{{ trans('category.title') }}</label>
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="input-group">
    <label for="description">{{ trans('category.description') }}</label>
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>