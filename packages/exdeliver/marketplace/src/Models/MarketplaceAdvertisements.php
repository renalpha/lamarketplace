<?php

namespace Exdeliver\Marketplace\Models;

class MarketplaceAdvertisements extends BaseModel
{

    protected $table = 'marketplace_advertisements';

    /**
     * get category data
     * @return mixed
     */
    public function category()
    {
        return $this->belongsTo(new MarketplaceCategories());
    }

    /**
     * get images data
     * @return mixed
     */
    public function images()
    {
        return $this->hasMany(new MarketplaceAdvertisementImages());
    }

    /**
     * Get cover image if available
     * @return mixed
     */
    public function getCoverAttribute()
    {
        $image = $this->images()->where('cover', '=', true)->first();

        if (isset($images)) {
            return $image;
        }

        return;
    }
}