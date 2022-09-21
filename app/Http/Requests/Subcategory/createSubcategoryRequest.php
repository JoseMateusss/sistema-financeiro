<?php

namespace App\Http\Requests\Subcategory;

use Illuminate\Foundation\Http\FormRequest;

class createSubcategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','min:3', 'string', 'unique:categories,name,NULL,id,company_id,'.$this->company_id.'',],
            'description' => ['required', 'min:3', 'string'],
            'company_id' => ['required']
        ];
    }
}
