<?php

namespace Exdeliver\Marketplace\Models;

class MarketplaceVendorInfo extends BaseModel
{

    protected $table = 'marketplace_vendor_info';

    public function vendor()
    {
        return $this->belongsTo(new MarketplaceVendors());
    }

    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
