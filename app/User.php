<?php

namespace App;

use Exdeliver\Marketplace\Models\MarketplaceCustomers;
use Exdeliver\Marketplace\Models\MarketplaceVendors;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * get customer data
     * @return mixed
     */
    public function customer()
    {
        return $this->hasOne(new MarketplaceCustomers());
    }

    /**
     * get customer vendor data
     * @return mixed
     */
    public function vendor()
    {
        return $this->hasMany(new MarketplaceVendors());
    }
}
