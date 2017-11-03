<?php

namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;
use Exdeliver\Marketplace\Requests\LoginFormRequest;
use Exdeliver\Marketplace\Services\MarketplaceUserService;
use Illuminate\Http\Request;

class MarketplaceAdminController extends Controller
{

    private $userservice;

    public function __construct()
    {
        $this->userservice = new MarketplaceUserService();
    }

    public function getDashboard()
    {
        if (!\Auth::check()) {
            return redirect()
                ->to('/admin/login');
        }

        return view('marketplace::admin.auth.dashboard');
    }

    /**
     * Get admin authentication login page
     * @return mixed
     */
    public function getLogin()
    {
        return view('marketplace::admin.auth.login');
    }

    /**
     * Get admin authentication registration page
     * @return mixed
     */
    public function getRegister()
    {
        return view('marketplace::admin.auth.register');
    }

    /**
     * Perform post login
     */
    public function login(LoginFormRequest $request)
    {
        $result = $this->userservice->login($request);

        $previous_url = (isset($request->previous_url) && $request->previous_url != '') ? $request->previous_url : '/admin';

        if ($result === false) {
            return redirect()
                ->back()
                ->withErrors(trans('marketplace::user.invalid_login'));
        }

        return redirect()
            ->to($previous_url)
            ->with('status', trans('marketplace::user.logged_in'));
    }

    /**
     * Perform post register
     */
    public function register($request)
    {
        $result = $this->userservice->register($request);
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()
            ->to('/admin/login')
            ->with('status', trans('marketplace::user.logged_out'));
    }
}