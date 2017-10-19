<?php

namespace Exdeliver\Marketplace\Services;

use Exdeliver\Marketplace\Models\MarketplaceCategories;
use Exdeliver\Marketplace\Repositories\DynamicModelRepository;

class MarketplaceService
{
    public function getModel($model)
    {
        return DynamicModelRepository($model);
    }

    public function getCategories()
    {
        return $this->getModel(new MarketplaceCategories())->getAll();
    }
}