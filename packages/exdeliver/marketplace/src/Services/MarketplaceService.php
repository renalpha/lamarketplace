<?php

namespace Exdeliver\Marketplace\Services;

use Exdeliver\Marketplace\Repositories\DynamicModelRepository;

class MarketplaceService
{
    public function getModel($model)
    {
        return DynamicModelRepository($model);
    }
}