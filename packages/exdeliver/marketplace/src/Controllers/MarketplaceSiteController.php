<?php

namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;
use Exdeliver\Marketplace\Models\MarketplaceAdvertisements;
use Illuminate\Http\Request;
use Exdeliver\Marketplace\Models\MarketplaceCategories;

class MarketplaceSiteController extends Controller
{
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
}