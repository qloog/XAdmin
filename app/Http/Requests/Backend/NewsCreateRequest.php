<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class NewsCreateRequest extends Request
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
            'title' => 'required|max:255',
            'ueditor' => 'required'
        ];
    }

    public function messages()
    {
        return  [
            'title.unique' => '“新闻标题”已存在。',
            'title.required' => '必须填写“新闻标题”',
            'ueditor.required' => '必须填写“正文内容”。'
        ];
    }

    /**
     * Return the fields and values to create a new news from
     */
    public function newsFillData()
    {
        return [
            'title' => $this->title,
            'category_id' => $this->category_id,
            'meta_keyword' => $this->meta_keyword,
            'meta_description' => $this->meta_description,
            'summary'   => $this->summary,
            'page_image' => $this->page_image ?: '',
            'content' => $this->ueditor,
            'views' => $this->views,
            'user_id' => Auth::user()->id,
            'status' => $this->status
        ];
    }
}
