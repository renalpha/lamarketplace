<?php namespace Exdeliver\Marketplace\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'       => 'required',
//            'slug'        => 'required|unique:marketplace_categories,slug,' . $this->route('id'),
//            'description' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}