<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Rules\UniqueNameByCompany;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'string',
                function ($attribute, $value, $fail) {
                    $verifyCategoryName = Category::where('name', $value)->where('company_id', $this->company_id)->where('id','<>', $this->category->id)->count();
                    if($verifyCategoryName > 0){
                        $fail('Esse nome de categoria já existe nessa empresa');
                    }
                },
            ],
            'description' => [
                'required',
                'min:3',
                'max:50',
                'string'
            ]
        ];
    }
}
