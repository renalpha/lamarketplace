<?php

namespace Exdeliver\Marketplace\Models;

use App\User;

class MarketplaceUsersRoles extends BaseModel
{
    protected $table = 'marketplace_users_roles';

    public function user()
    {
        return $this->belongsTo(new User());
    }

    public function role()
    {
        return $this->hasOne(new MarketplaceRoles());
    }
}