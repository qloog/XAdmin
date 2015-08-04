<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class NewsRequest extends Request
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
            'title' => 'required|unique:news|max:255',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return  [
            'title.unique' => '“新闻标题”已存在。',
            'title.required' => '必须填写“新闻标题”',
            'content.required' => '必须填写“正文内容”。'
        ];
    }
}
