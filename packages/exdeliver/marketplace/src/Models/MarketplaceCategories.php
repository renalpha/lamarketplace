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

    public function getSubcategoriesAttribute()
    {
        return $this->childs()->get();
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