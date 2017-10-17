@extends('marketplace::admin.layouts.auth.master')

@section('content')
        <!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="text-center" style="padding:50px 0">
    <div class="logo"><h1>EXDELIVER</h1><h3>Marketplace Software</h3></div>
    <!-- Main Form -->
    <div class="login-form-1">

        @if(count($errors) > 0)
            <div class="alert alert-danger text-center">
                @foreach($errors->all() AS $error)
                    {!!  $error !!}<br>
                @endforeach
            </div>
        @endif

        @if(Session::has('status'))
            <div class="alert alert-success text-center">
                {!! Session::get('status') !!}
            </div>
        @endif

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
                {!! Form::button('<i class="fa fa-chevron-right"></i>',['type' => 'submit', 'class' => 'login-button']) !!}
            </div>
            <div class="etc-login-form">
                <p>{{ __('marketplace::user.forgot_account') }} <a href="#">{{ __('marketplace::elements.click_here') }}</a></p>
            </div>
        {!! Form::close() !!}
    </div>
    <!-- end:Main Form -->
</div>

@stop