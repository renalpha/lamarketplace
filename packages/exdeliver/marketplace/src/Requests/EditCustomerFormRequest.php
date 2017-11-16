<?php namespace Exdeliver\Marketplace\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCustomerFormRequest extends FormRequest
{
    public function rules()
    {
        return [
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