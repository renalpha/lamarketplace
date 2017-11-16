@extends('marketplace::site.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>{!! trans('marketplace::elements.request_password') !!}</h3>

                {!! Form::open(['url' => Request::path(), 'class' => 'text-left', 'id' => 'login-form']) !!}
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="lg_username" class="sr-only">{{ __('marketplace::user.email') }}</label>
                            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'lg_username', 'placeholder' => __('marketplace::user.email')]) !!}
                        </div>
                    </div>
                    {!! Form::button('<i class="fa fa-chevron-right"></i> '.trans('marketplace::elements.request_password'),['type' => 'submit', 'class' => 'login-button btn btn-primary']) !!}
                </div>
                <div class="etc-login-form">
                    <br />
                    <p>{{ __('marketplace::user.login') }} <a
                                href="/user/login">{{ __('marketplace::elements.click_here') }}</a></p>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop