<?php

namespace Exdeliver\Marketplace\Services;

class MarketplaceCategoryService
{
    public function save($category_repository, $request)
    {
        $category_repository = $category_repository->get($request->id);

        if(!isset($category))
        {
            $category_repository = $category_repository;
            $category_repository->created_at = date('Y-m-d H:i:s');
            $state = 'new';
        }

        $category_repository->user_id = \Auth::user()->id;
        $category_repository->updated_at = date('Y-m-d H:i:s');
        $category_repository->title = $request->title;
        $category_repository->slug = str_slug($request->title);
        $category_repository->description = $request->description;
        $category_repository->save();
    }
}