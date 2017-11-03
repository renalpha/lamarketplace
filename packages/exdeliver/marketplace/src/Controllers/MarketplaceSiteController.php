<?php

namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;
use Exdeliver\Marketplace\Models\MarketplaceAdvertisements;
use Exdeliver\Marketplace\Models\MarketplaceCategories;
use Exdeliver\Marketplace\Requests\AdvertisementFormRequest;
use Exdeliver\Marketplace\Requests\LoginFormRequest;
use Exdeliver\Marketplace\Requests\RegisterCustomerFormRequest;
use Exdeliver\Marketplace\Services\MarketplaceUserService;
use Illuminate\Http\Request;

class MarketplaceSiteController extends Controller
{
    public $userservice;
    public $advertisements_repository;

    public function __construct()
    {
        $this->advertisements_repository = \MarketplaceService::getModel(new MarketplaceAdvertisements());
        $this->userservice = new MarketplaceUserService();
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
    public function register(RegisterCustomerFormRequest $request)
    {
        $result = $this->userservice->save($request, ['role' => 'customer']);
        if($result['status'] === true) {
            $result = $this->userservice->registerCustomer($request, $result);
        }

        return redirect()
            ->to('/')
            ->with('status', trans('marketplace::auth.account_successfully_created'));
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()
            ->to('/user/login')
            ->with('status', trans('marketplace::user.logged_out'));
    }

    public function getManageAdvertisement($advertisement_id = null, $category = null)
    {
        if (isset($advertisement_id)) {
            return view('site.modules.marketplace.advertisements.edit');
        }

        return view('site.modules.marketplace.advertisements.create');
    }

    public function getNewAdvertisement()
    {
        return view('marketplace::site.modules.marketplace.advertisements.new');
    }


    public function storeAdvertisement(AdvertisementFormRequest $request)
    {
        $advertisement = $this->advertisements_repository->get($request->id);

        if(!isset($advertisement))
        {
            $advertisement = new MarketplaceAdvertisements();
            $advertisement->created_at = date('Y-m-d H:i:s');
            $state = 'new';
        }

        $advertisement->user_id = \Auth::user()->id;
        $advertisement->category_id = $request->category_id;
        $advertisement->vendor_id = (isset($request->vendor_id)) ? $request->vendor_id : 1;
        $advertisement->updated_at = date('Y-m-d H:i:s');
        $advertisement->title = $request->title;
        $advertisement->slug = str_slug($request->title);
        $advertisement->content = $request->content;
        $advertisement->save();

        if(isset($state))
        {
            return redirect()
                ->to($advertisement->category->slug.'/advertisement/'.$advertisement->slug)
                ->with('status', trans('marketplace::elements.saved_succesfully'));
        }

        return redirect()
            ->back()
            ->with('status', trans('marketplace::elements.saved_succesfully'));
    }
}