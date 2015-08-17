<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'category_id',
        'event_image',
        'begin_time',
        'end_time',
        'content',
        'user_count',
        'user_id',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function users()
    {
        return $this->hasMany('App\Models\EventUser', 'event_id', 'id');
    }

    public function getBeginTimeAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function getEndTimeAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }
}
