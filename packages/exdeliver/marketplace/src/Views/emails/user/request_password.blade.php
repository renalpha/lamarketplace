@component('marketplace::emails.layouts.master', ['settings' => $settings])
@slot('title')
<h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;"
    align="left">
    {{ trans('marketplace::user.email_templates.dear') }}, {{$user->name}}!
</h1>
@endslot

@slot('body')
<p style="box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;"
   align="left">{{ trans('marketplace::user.email_templates.request_password.thank_you') }}</p>
<p style="box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;"
   align="left">{{ trans('marketplace::user.email_templates.request_password.instructions') }}</p>
<p style="box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;"
   align="left"><a href="">Specia link to click on etc</a></p>
@endslot

@endcomponent
