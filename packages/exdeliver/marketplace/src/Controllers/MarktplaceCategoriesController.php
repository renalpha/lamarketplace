<?php namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;

use Exdeliver\Marketplace\Models\MarketplaceCategories;
use Exdeliver\Marketplace\Requests\CategoriesFormRequest;
use Exdeliver\Marketplace\Services\MarketplaceService;

class MarketplaceCategoriesController extends MarketplaceAdminController
{
    public $categories_repository;

    public function __construct()
    {
        $this->categories_repository = MarketplaceService::getModel(new MarketplaceCategories());
    }
    /**
     * Show categories overview
     */
    public function index()
    {
        $categories = $this->categories_repository->getAll();

        return view('marketplace::admin.modules.categories.index')
            ->with('categories', $categories);
    }

    public function detail($id = null)
    {
        $category = $this->categories_repository->get($id);
        if(isset($category))
        {
            return view('marketplace::categories.detail')
                ->with('category', $category);
        }

        return redirect()->back()
            ->withErrors(trans('marketplace::categories.category_not_found'));

    }

    public function store(CategoriesFormRequest $request)
    {
        $category = $this->categories_repository->get($id);
        if(isset($category))
        {

        }


    }
}