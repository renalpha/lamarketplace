<?php

namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;
use Exdeliver\Marketplace\Models\MarketplaceAdvertisements;
use Exdeliver\Marketplace\Services\MarketplaceService;
use Exdeliver\Marketplace\Services\MarketplaceAdvertisementService;
use Exdeliver\Marketplace\Requests\AdvertisementFormRequest;

class MarketplaceAdvertisementsController extends Controller
{

    public $advertisements_repository;

    public function __construct()
    {
        $this->advertisements_repository = \MarketplaceService::getModel(new MarketplaceAdvertisements());
    }

    public function getList()
    {
        $advertisements = $this->advertisements_repository->getAll();

        return view('marketplace::admin.modules.marketplace.advertisements.list')
            ->with('advertisements', $advertisements);
    }

    public function getNew()
    {
        return view('marketplace::admin.modules.marketplace.advertisements.new');
    }

    public function getEdit($advertisement_id = null)
    {
        $advertisement = $this->advertisements_repository->get($advertisement_id);

        if(!isset($advertisement))
        {
            return redirect()
                ->back()
                ->withErrors(trans('marketplace::elements.name_does_not_exists', ['name' => trans('marketplace::elements.advertisement')]));
        }

        return view('marketplace::admin.modules.marketplace.advertisements.edit')
            ->with('advertisement', $advertisement);
    }

    public function store(AdvertisementFormRequest $request)
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
        $advertisement->vendor_id = \Auth::user()->vendor()->first()->id;
        $advertisement->updated_at = date('Y-m-d H:i:s');
        $advertisement->title = $request->title;
        $advertisement->slug = str_slug($request->title);
        $advertisement->content = $request->content;
        $advertisement->price = number_format($request->price,2);
        $advertisement->save();

        $files = $request->files->all();
        if(isset($files) && count($files['files']) > 0) {
            $image_service = new MarketplaceAdvertisementService();
            $image_service->imageupload($files['files'], $advertisement);
        }

        if(isset($state))
        {
            return redirect()
                ->to('/admin/marketplace/advertisements/edit/'.$advertisement->id)
                ->with('status', trans('marketplace::elements.saved_succesfully'));
        }

        return redirect()
            ->back()
            ->with('status', trans('marketplace::elements.saved_succesfully'));
    }

    public function remove($advertismenet_id = null)
    {
        $this->advertisements_repository->delete($advertismenet_id);

        return redirect()
            ->back()
            ->with('status', trans('marketplace::elements.saved_succesfully'));
    }
}