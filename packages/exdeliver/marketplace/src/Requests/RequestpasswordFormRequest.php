<?php namespace Exdeliver\Marketplace\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestpasswordFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}