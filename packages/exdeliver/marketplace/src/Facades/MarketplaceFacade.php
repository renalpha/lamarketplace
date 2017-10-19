<?php namespace Exdeliver\Marketplace\Facades;

use Illuminate\Support\Facades\Facade;

class MarketplaceFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'marketplaceservice';
    }
}