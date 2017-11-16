<?php

namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;
use Exdeliver\Marketplace\Models\MarketplaceVendorInfo;
use Exdeliver\Marketplace\Requests\EditCustomerFormRequest;
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

    public function getAccount()
    {
        if (isset(\Auth::user()->customer)) {
            $account_type = \Auth::user()->customer;
        } elseif (\Auth::user()->vendor) {
            $account_type = \Auth::user()->vendor;
        }

        $account_type = (isset($account_type)) ? $account_type->first() : null;

        $account_type = (isset($account_type)) ? $account_type->contact : null;

        return view('marketplace::site.auth.account')
            ->with('account', \Auth::user())
            ->with('account_type', $account_type);
    }

    /**
     * save account information
     */
    public function account(EditCustomerFormRequest $request)
    {

        // check for vendors
        if (isset(\Auth::user()->customer)) {
            $account_type = \Auth::user()->customer;
        } elseif (\Auth::user()->vendor) {
            $account_type = \Auth::user()->vendor;
        }

        if(isset($account_type) && count($account_type) == 0) {
            $result = $this->userservice->registerVendor($request, ['user_id' => \Auth::user()->id]);
        }

        // change password if set
        $this->userservice->changePassword($request);

        $vendor_info = MarketplaceVendorInfo::where('vendor_id', '=', \Auth::user()->vendor->first()->id)->first();

        $result = $this->userservice->registerVendorInfo($vendor_info, $request);

        return redirect()
            ->back()
            ->with('status', trans('marketplace::name_changed_successfully'));
    }
}