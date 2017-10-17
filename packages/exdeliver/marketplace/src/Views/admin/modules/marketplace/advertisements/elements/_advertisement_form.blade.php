<div class="input-group">
    <label for="title">{{ trans('category.title') }}</label>
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="input-group">
    <label for="content">{{ trans('category.content') }}</label>
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>