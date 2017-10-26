<?php

namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;

use Exdeliver\Marketplace\Models\MarketplaceCategories;
use Exdeliver\Marketplace\Requests\CategoriesFormRequest;
use Exdeliver\Marketplace\Services\MarketplaceService;

class MarketplaceCategoriesController extends MarketplaceAdminController
{
    public $categories_repository;

    public function __construct()
    {
        $this->categories_repository = \MarketplaceService::getModel(new MarketplaceCategories());
    }
    /**
     * Show categories overview
     */
    public function getList()
    {
        $categories = $this->categories_repository->getAll();

        return view('marketplace::admin.modules.marketplace.categories.list')
            ->with('categories', $categories);
    }

    public function getNew()
    {
        return view('marketplace::admin.modules.categories.new');
    }

    public function getEdit($id = null)
    {
        $category = $this->categories_repository->get($id);
        if(isset($category))
        {
            return view('marketplace::admin.modules.marketplace.categories.edit')
                ->with('category', $category);
        }

        return redirect()->back()
            ->withErrors(trans('marketplace::categories.category_not_found'));
    }

    public function store(CategoriesFormRequest $request)
    {
        $category = $this->categories_repository->get($request->id);

        if(!isset($category))
        {
            $category = new MarketplaceCategories();
            $category->created_at = date('Y-m-d H:i:s');
        }

        $category->updated_at = date('Y-m-d H:i:s');
        $category->title = $request->title;
        $category->slug = str_slug($request->title);
        $category->description = $request->description;
        $category->save();

        return redirect()
            ->back()
            ->with('status', trans('marketplace::elements.saved_succesfully'));
    }
}