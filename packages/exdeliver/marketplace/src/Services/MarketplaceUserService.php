<?php

namespace Exdeliver\Marketplace\Services;

use App\User;
use Exdeliver\Marketplace\Mail\RequestPassword;
use Exdeliver\Marketplace\Models\MarketplaceCustomerBilling;
use Exdeliver\Marketplace\Models\MarketplaceCustomers;
use Exdeliver\Marketplace\Models\MarketplaceUsersRoles;
use Exdeliver\Marketplace\Models\MarketplaceVendorInfo;
use Exdeliver\Marketplace\Models\MarketplaceVendors;

class MarketplaceUserService
{
    public function save($input = null, $params = null)
    {
        try {
            // already have validated existing user, but we want to do that again
            $user = \MarketplaceService::getModel(new User())->where('email', '=', $input->email)->first();
            if (isset($user)) {
                return ['status' => false, 'message' => trans('marketplace::user.user_already_exists', ['username' => $input->email])];
            }

            $input->merge(['name' => ucfirst($input->first_name) . ' ' . $input->last_name]);

            $input->password = \Hash::make($input->password);

            $user = new User();
            $user->name = $input->name;
            $user->email = $input->email;

            $user->password = $input->password;
            $user->save();

            $role = 2; // vendor
            $this->registerRole($user->id, $role);

            return ['status' => true, 'user_id' => $user->id];

        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function login($request = null)
    {
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {

            // Authentication passed...
            return true;
        } else {
            return false;
        }
    }

    public function requestPassword($request = null)
    {

        $user = \MarketplaceService::getModel(new User())->where('email', '=', $request->email)->first();

        if (isset($user)) {

            \Mail::to($user->email)->send(new RequestPassword($user));

            return ['status' => true, 'message' => trans('marketplace::user.confirmation_send_successfully')];
        }

        return ['status' => false, 'message' => trans('marketplace::user.user_not_exists', ['email' => $request->email])];
    }

    public function registerCustomer($request, $params = null)
    {
        $customer = new MarketplaceCustomers();
        $customer->user_id = $params['user_id'];
        $customer->created_at = date('Y-m-d H:i:s');
        $customer->updated_at = date('Y-m-d H:i:s');
        $customer->save();

        $this->registerCustomerBilling(new MarketplaceCustomerBilling(), $request, ['customer_id' => $customer->id]);

        return $customer->id;

    }

    public function registerCustomerBilling(MarketplaceCustomerBilling $customer_billing, $request, $params = null)
    {
        if (!isset($customer_billing->id)) {
            $customer_billing->created_at = date('Y-m-d H:i:s');
            $customer_billing->customer_id = $params['customer_id'];
        }

        $customer_billing->updated_at = date('Y-m-d H:i:s');

        $customer_billing->firstname = $request->first_name;
        $customer_billing->lastname = $request->last_name;
        $customer_billing->street = $request->street;
        $customer_billing->street_number = $request->street_number;
        $customer_billing->zipcode = $request->zipcode;
        $customer_billing->city = $request->city;
        $customer_billing->phone = $request->phone;
        $customer_billing->mobile = $request->mobile;
//        $customer_billing->country = $request->country;

        $customer_billing->save();
    }

    public function registerVendor($request, $params = null)
    {
        $vendor = new MarketplaceVendors();
        $vendor->user_id = $params['user_id'];
        $vendor->created_at = date('Y-m-d H:i:s');
        $vendor->updated_at = date('Y-m-d H:i:s');
        $vendor->save();

        $this->registerVendorInfo(new MarketplaceVendorInfo(), $request, ['vendor_id' => $vendor->id]);

        return $vendor->id;
    }

    public function registerVendorInfo(MarketplaceVendorInfo $vendor_info, $request, $params = null)
    {
        if (!isset($vendor_info->id)) {
            $vendor_info->created_at = date('Y-m-d H:i:s');
            $vendor_info->vendor_id = $params['vendor_id'];
        }

        $vendor_info->updated_at = date('Y-m-d H:i:s');

        $vendor_info->firstname = $request->first_name;
        $vendor_info->lastname = $request->last_name;
        $vendor_info->street = $request->street;
        $vendor_info->street_number = $request->street_number;
        $vendor_info->zipcode = $request->zipcode;
        $vendor_info->city = $request->city;
        $vendor_info->phone = $request->phone;
        $vendor_info->mobile = $request->mobile;
//        $vendor_info->country = $request->country;

        $vendor_info->save();
    }

    public function registerRole($user_id, $role_id)
    {
        try {
            $role = new MarketplaceUsersRoles();
            $role->user_id = $user_id;
            $role->role_id = $role_id;
            $role->created_at = date('Y-m-d H:i:s');
            $role->updated_at = date('Y-m-d H:i:s');
            $role->save();

            return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function changePassword($request)
    {

        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        if (isset($password) && $password != '' && isset($password_confirmation) && $password_confirmation != '' && $password == $password_confirmation && strlen($password) > 6) {
            $password = \Hash::make($password);
            $user = \App\User::where('id', '=', \Auth::user()->id)->firstOrFail();
            $user->password = $password;
            $user->save();

            return true;
        }

        return false;
    }
}