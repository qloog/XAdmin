<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use Auth;

class EventCreateRequest extends Request
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
            'title.required' => '必须填写“活动标题”',
            'ueditor.required' => '必须填写“活动详情”。'
        ];
    }

    /**
     * Return the fields and values to create a new news from
     */
    public function eventFillData()
    {
        return [
            'title' => $this->title,
            'event_image' => $this->event_image,
            'begin_time' => $this->begin_time,
            'end_time' => $this->end_time,
            'content'   => $this->ueditor,
            'user_count' => 0,
            'user_id' => Auth::user()->id
        ];
    }
}
