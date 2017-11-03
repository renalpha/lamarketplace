<?php namespace Exdeliver\Marketplace\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCustomerFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'         => 'required|unique:users,email',
            'password'      => 'required|confirmed',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'street'        => 'required',
            'street_number' => 'required',
            'zipcode'       => 'required',
            'city'          => 'required',
            'country'       => 'sometimes',
            'phone'         => 'required_without:mobile',
            'mobile'        => 'required_without:phone',
        ];
    }

    public function authorize()
    {
        return true;
    }
}