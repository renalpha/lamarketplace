<?php

namespace Exdeliver\Marketplace\Models;

class MarketplaceCustomerBilling extends BaseModel
{
    protected $table = 'marketplace_customer_billing';

    public function customer()
    {
        return $this->belongsTo(new MarketplaceCustomers());
    }
}