
<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
    <div class="logo">{{ __('marketplace::user.register') }}</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="register-form" class="text-left">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="reg_username" class="sr-only">{{ __('marketplace::user.username') }}</label>
                        <input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="{{ __('marketplace::user.username') }}">
                    </div>
                    <div class="form-group">
                        <label for="reg_password" class="sr-only">{{ __('marketplace::user.password') }}</label>
                        <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="{{ __('marketplace::user.password') }}">
                    </div>
                    <div class="form-group">
                        <label for="reg_password_confirm" class="sr-only">{{ __('marketplace::user.password_confirmation') }}</label>
                        <input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="{{ __('marketplace::user.password_confirmation') }}">
                    </div>

                    <div class="form-group">
                        <label for="reg_email" class="sr-only">{{ __('marketplace::user.email') }}</label>
                        <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="{{ __('marketplace::user.email') }}">
                    </div>
                    <div class="form-group">
                        <label for="reg_fullname" class="sr-only">Full Name</label>
                        <input type="text" class="form-control" id="reg_fullname" name="reg_fullname" placeholder="full name">
                    </div>

                    <div class="form-group login-group-checkbox">
                        <input type="radio" class="" name="reg_gender" id="male" placeholder="username">
                        <label for="male">male</label>

                        <input type="radio" class="" name="reg_gender" id="female" placeholder="username">
                        <label for="female">female</label>
                    </div>

                    <div class="form-group login-group-checkbox">
                        <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                        <label for="reg_agree">i agree with <a href="#">terms</a></label>
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <p>already have an account? <a href="#">login here</a></p>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>
