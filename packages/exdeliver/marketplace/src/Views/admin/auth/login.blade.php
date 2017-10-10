@extends('marketplace::admin.layouts.auth.master')

@section('content')
        <!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="text-center" style="padding:50px 0">
    <div class="logo">{{ __('marketplace::user.login') }}</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="login-form" class="text-left">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="lg_username" class="sr-only">{{ __('marketplace::user.username') }}</label>
                        <input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="{{ __('marketplace::user.username') }}">
                    </div>
                    <div class="form-group">
                        <label for="lg_password" class="sr-only">{{ __('marketplace::user.password') }}</label>
                        <input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="{{ __('marketplace::user.password') }}">
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <p>{{ __('marketplace::user.forgot_account') }} <a href="#">{{ __('marketplace::elements.click_here') }}</a></p>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>

@stop