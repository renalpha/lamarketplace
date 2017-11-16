@extends('marketplace::site.layouts.master')

@section('breadcrumb')
    <li>User</li>
    <li class="active">{!! $account->name !!}</li>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>{!! $account->name !!}</h3>

                {!! Form::model($account_type, ['method' => 'post', 'id' => 'registerForm']) !!}
                <div class="form-group">
                    <label>{!! trans('marketplace::elements.password') !!}</label>
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>{!! trans('marketplace::elements.password_confirmation') !!}</label>
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                <hr/>
                <div class="form-group">
                    <label>{!! trans('marketplace::elements.firstname') !!}</label>
                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>{!! trans('marketplace::elements.lastname') !!}</label>
                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-8">
                            <label>{!! trans('marketplace::elements.street') !!}</label>
                            {!! Form::text('street', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-4">
                            <label>{!! trans('marketplace::elements.street_number') !!}</label>
                            {!! Form::text('street_number', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{!! trans('marketplace::elements.zipcode') !!}</label>
                    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>{!! trans('marketplace::elements.city') !!}</label>
                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>{!! trans('marketplace::elements.country') !!}</label>
                    <?php
                    $country_list = ['nl' => 'Nederland', 'be' => 'Belgie/Belgique', 'de' => 'Deutschland'];
                    ?>
                    {!! Form::select('country', $country_list, 'nl', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>{!! trans('marketplace::elements.phone') !!}</label>
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>{!! trans('marketplace::elements.mobile_phone') !!}</label>
                    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit(trans('marketplace::auth.change_account'), ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@stop