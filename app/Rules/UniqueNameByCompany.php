<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;

class UniqueNameByCompany implements DataAwareRule, InvokableRule
{
    protected $data = [];
    public function __invoke($attribute, $value, $fail)
    {
        dd($this->data);
        $verify = Category::where('name', $value)->where('company_id', $this->data['company_id'])->where('id','<>', $this->data['id'])->get();
        dd(count($verify));
        if (count($verify) > 0) {
            $fail('Esse nome já existe');
        }
    }
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
