<?php

namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketplaceAdminController extends Controller
{
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
    public function login()
    {

    }

    /**
     * Perform post register
     */
    public function register()
    {

    }
}