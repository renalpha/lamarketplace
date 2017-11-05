<?php

namespace Exdeliver\Marketplace\Services;

use App\User;
use Exdeliver\Marketplace\Models\MarketplaceCategories;
use Exdeliver\Marketplace\Repositories\DynamicModelRepository;

class MarketplaceService
{
    public function getModel($model)
    {
        return new DynamicModelRepository($model);
    }

    public function getCategories()
    {
        $categories = $this->getModel(new MarketplaceCategories());
        return $categories;
    }

    public function selectCategories($params = null)
    {
        $categories = $this->getCategories()->pluck('title','id')->toArray();
        if (isset($params['selection'])) {
            $categories[null] = trans('marketplace::elements.parent_category');
        }
        return $categories;
    }

    public function selectUser($params = null)
    {
        $users = $this->getModel(new User())->pluck('email','id');

        if (isset($params['selection'])) {
            $users[null] = trans('marketplace::elements.user');
        }
        return $users;
    }
}