<?php

namespace Exdeliver\Marketplace\Models;

class MarketplaceCustomerShipping extends BaseModel
{
    protected $table = 'marketplace_customer_shipping';

    /**
     * get customer model
     * @return mixed
     */
    public function customer()
    {
        return $this->belongsTo(new MarketplaceCustomers());
    }
}