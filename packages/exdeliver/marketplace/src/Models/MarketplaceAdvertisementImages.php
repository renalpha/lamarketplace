<?php

namespace Exdeliver\Marketplace\Models;

class MarketplaceAdvertisementImages extends BaseModel{

    protected $table = 'marketplace_advertisement_images';

    /**
     * get advertisement data
     * @return mixed
     */
    public function advertisement()
    {
        return $this->belongsTo(new MarketplaceAdvertisements());
    }
}