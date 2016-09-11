<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class NewsCategoryCreateRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:20',
            'pid' => 'required'
        ];
    }

    public function messages()
    {
        return  [
            'name.unique' => '“该分类”已存在。',
            'pid.required' => '请选择父级分类',
        ];
    }

    /**
     * Return the fields and values to create a new news from
     */
    public function categoryFillData()
    {
        return [
            'name' => $this->name,
            'pid' => $this->pid,
        ];
    }
}
