<?php

namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;
use Exdeliver\Marketplace\Models\MarketplaceAdvertisements;
use Exdeliver\Marketplace\Models\MarketplaceCategories;
use Exdeliver\Marketplace\Requests\LoginFormRequest;
use Exdeliver\Marketplace\Services\UserService;
use Illuminate\Http\Request;

class MarketplaceSiteController extends Controller
{
    public $userservice;

    public function __construct()
    {
        $this->userservice = new UserService();
    }

    public function getHome()
    {
        return view('marketplace::site.pages.home');
    }

    public function getCategory($slug = null)
    {

        $category = MarketplaceCategories::where('slug', $slug)->firstOrFail();
        return view('marketplace::site.pages.category')
            ->with('category', $category);
    }

    public function getAdvertisement($category = null, $slug = null)
    {
        $advertisement = MarketplaceAdvertisements::where('slug', $slug)->firstOrFail();
        return view('marketplace::site.pages.advertisement')
            ->with('advertisement', $advertisement);
    }

    /**
     * Get site authentication login page
     * @return mixed
     */
    public function getLogin()
    {
        return view('marketplace::site.auth.login');
    }

    /**
     * Get site authentication registration page
     * @return mixed
     */
    public function getRegister()
    {
        return view('marketplace::site.auth.register');
    }


    /**
     * Perform post login
     */
    public function login(LoginFormRequest $request)
    {
        $result = $this->userservice->login($request);

        if ($result === false) {
            return redirect()
                ->back()
                ->withErrors(trans('marketplace::user.invalid_login'));
        }

        return redirect()
            ->to('/')
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
            ->to('/user/login')
            ->with('status', trans('marketplace::user.logged_out'));
    }
}