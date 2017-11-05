<?php namespace Exdeliver\Marketplace\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'   => 'required',
            'content' => 'required',
            'category_id' => 'required',
//            'slug'    => 'required|unique:marketplace_advertisements,slug,' . $this->route('id'),
        ];
    }

    public function authorize()
    {
        return true;
    }
}