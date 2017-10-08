<?php

namespace Exdeliver\Marketplace\Services;

use App\User;
use Exdeliver\Marketplace\Mail\RequestPassword;

class UserService
{
    public function save($input = null)
    {
        try {
            // already have validated existing user, but we want to do that again
            $user = User::where('username', '=', $input->username)->first();
            if (isset($user)) {
                return ['status' => false, 'message' => trans('marketplace::user.user_already_exists',['username' => $input->username])];
            }

            $input->merge(['name' => ucfirst($input->first_name) . ' ' . $input->last_name]);

            $input->password = \Hash::make($input->user_password);

            $result = User::create($input->all());

            return ['status' => true];

        }catch(\Exception $e)
        {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function login($request = null)
    {
        if (\Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            // Authentication passed...
            return true;
        }else{
            return false;
        }
    }

    public function requestPassword($request = null)
    {
        $user = User::where('username', $request->username)->first();

        if(isset($user))
        {
            \Mail::to($user->email)->send(new RequestPassword($user));

            return ['status' => true, 'message' => trans('marketplace::user.confirmation_send_successfully')];
        }

        return ['status' => false, 'message' => trans('marketplace::user.user_not_exists', ['username' => $request->username])];
    }
}