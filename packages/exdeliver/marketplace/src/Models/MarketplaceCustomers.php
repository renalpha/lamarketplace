<?php

namespace Exdeliver\Marketplace\Models;

class MarketplaceCustomers extends BaseModel
{
    protected $table = 'marketplace_customers';

    /**
     * get billing data
     * @return mixed
     */
    public function billing()
    {
        return $this->hasOne(new MarketplaceCustomerBilling());
    }

    /**
     * Get shipping data
     * @return mixed
     */
    public function shipping()
    {
        return $this->hasOne(new MarketplaceCustomerShipping());
    }
}