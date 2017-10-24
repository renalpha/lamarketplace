<?php

namespace Exdeliver\Marketplace\Models;

class MarketplaceCategories extends BaseModel
{

    protected $table = 'marketplace_categories';

    /**
     * get advertisement data
     * @return mixed
     */
    public function advertisements()
    {
        return $this->hasMany(new MarketplaceAdvertisements(), 'category_id');
    }

    public function childs()
    {
        return $this->hasMany(new MarketplaceCategories(), 'parent_id');
    }
}