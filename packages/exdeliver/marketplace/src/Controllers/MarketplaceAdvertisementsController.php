<?php

namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;
use Exdeliver\Marketplace\Models\MarketplaceAdvertisements;
use Exdeliver\Marketplace\Services\MarketplaceService;
use Exdeliver\Marketplace\Requests\AdvertisementFormRequest;

class MarketplaceAdvertisementController extends Controller
{

    public $advertisements_repository;

    public function __construct()
    {
        $this->advertisements_repository = MarketplaceService::getModel(new MarketplaceAdvertisements());
    }

    public function index()
    {
        $advertisements = $this->advertisements_repository->getAll();

        return view('marketplace::admin.modules.advertisements.index')
            ->with('advertisements', $advertisements);
    }

    public function store(AdvertisementFormRequest $request)
    {

    }
}