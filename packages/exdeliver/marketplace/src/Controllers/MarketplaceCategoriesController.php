<?php

namespace Exdeliver\Marketplace\Controllers;

use App\Http\Controllers\Controller;
use Exdeliver\Marketplace\Models\MarketplaceCategories;
use Exdeliver\Marketplace\Requests\CategoriesFormRequest;

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
        return view('marketplace::admin.modules.marketplace.categories.new');
    }

    public function getEdit($id = null)
    {
        $category = $this->categories_repository->get($id);
        if (!isset($category)) {
            return redirect()->back()
                ->withErrors(trans('marketplace::categories.name_does_not_exists', ['name' => trans('marketplace::elements.category')]));

        }
        return view('marketplace::admin.modules.marketplace.categories.edit')
            ->with('category', $category);

    }

    public function store(CategoriesFormRequest $request)
    {
        $category = $this->categories_repository->get($request->id);

        if (!isset($category)) {
            $category = new MarketplaceCategories();
            $category->created_at = date('Y-m-d H:i:s');
            $state = 'new';
        }

        $category->user_id = \Auth::user()->id;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->title = $request->title;
        $category->slug = str_slug($request->title);
        $category->description = $request->description;
        $category->save();

        if (isset($state)) {
            return redirect()
                ->to('/admin/marketplace/categories/edit/' . $category->id)
                ->with('status', trans('marketplace::elements.saved_succesfully'));
        }

        return redirect()
            ->back()
            ->with('status', trans('marketplace::elements.saved_succesfully'));
    }

    public function remove($category_id = null)
    {
        $category = $this->categories_repository->get($category_id);
        $category->delete();
        return redirect()
            ->back()
            ->with('status', trans('marketplace::elements.saved_succesfully'));
    }
}