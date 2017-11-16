@extends('marketplace::site.layouts.master')

@section('breadcrumb')
    <li>User</li>
    <li class="active">Login</li>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Inloggen</h3>

                {!! Form::open(['url' => Request::path(), 'class' => 'text-left', 'id' => 'login-form']) !!}
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="lg_username" class="sr-only">{{ __('marketplace::user.username') }}</label>
                            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'lg_username', 'placeholder' => __('marketplace::user.username')]) !!}
                        </div>
                        <div class="form-group">
                            <label for="lg_password" class="sr-only">{{ __('marketplace::user.password') }}</label>
                            {!! Form::password('password', ['class' => 'form-control', 'id' => 'lg_password', 'placeholder' => __('marketplace::user.password')]) !!}
                        </div>
                    </div>
                    {!! Form::button('<i class="fa fa-chevron-right"></i> '.trans('marketplace::elements.login'),['type' => 'submit', 'class' => 'login-button btn btn-primary']) !!}
                </div>
                <div class="etc-login-form">
                    <p>{{ __('marketplace::user.forgot_account') }} <a
                                href="/user/request-password">{{ __('marketplace::elements.click_here') }}</a></p>
                </div>
                {!! Form::hidden('previous_url', \Request::get('previous-url')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop