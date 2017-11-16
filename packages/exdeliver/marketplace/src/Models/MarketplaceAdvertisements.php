<?php

namespace Exdeliver\Marketplace\Models;

use App\User;

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
        return $this->hasMany(new MarketplaceAdvertisementImages(), 'advertisement_id');
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

    public function user()
    {
        return $this->belongsTo(new User());
    }

    public function vendor()
    {
        return $this->belongsTo(new MarketplaceVendors());
    }

    public function setSlugAttribute($value)
    {
        try {
            $slug = $value;

            // updating slug
            if (isset($this->slug) && $this->slug != '') {
                // yes update and name is same as given slug so just update it
                if ($this->slug == $slug) {
                    return $this->attributes['slug'] = $slug;
                }
            }
            // get plain slug
            $slugs = static::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'");

            // if there are not slugs available else
            if ($slugs->count() === 0) {
                return $this->attributes['slug'] = $slug;
            }

            // get reverse order and get first
            $lastSlugNumber = intval(str_replace($slug . '-', '', $slugs->orderBy('slug', 'desc')->first()->slug));

            return $this->attributes['slug'] = $slug . '-' . ($lastSlugNumber + 1);
        } catch (\Exception $e) {
            return $e->getMessage() . ' line: ' . $e->getLine();
        }
    }
}