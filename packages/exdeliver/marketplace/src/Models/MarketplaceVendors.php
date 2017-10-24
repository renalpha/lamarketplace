<?php

namespace Exdeliver\Marketplace\Models;

use App\User;

class MarketplaceVendors extends BaseModel{

    protected $table = 'marketplace_vendors';

    /**
     * get user data
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(new User());
    }

    public function contact()
    {
        return $this->hasOne(new MarketplaceVendorInfo(), 'vendor_id');
    }

    public function advertisements()
    {
        return $this->hasMany(new MarketplaceAdvertisements());
    }
}