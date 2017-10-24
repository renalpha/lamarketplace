{!! Form::open() !!}
<div class="form-horizontal">
    <div class="form-group">
        {!! Form::text('search', null, ['class' => 'form-control input-sm']) !!}
        {!! Form::button('<i class="fa fa-magnifier"></i> '.trans('marketplace::elements.search'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
    </div>
</div>
{!! Form::close() !!}