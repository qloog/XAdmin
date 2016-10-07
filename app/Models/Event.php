<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Event
 *
 * @property integer $id
 * @property string $title 活动名称
 * @property string $event_image 活动头图
 * @property string $begin_time 活动开始时间
 * @property string $end_time 活动结束时间
 * @property string $content 活动详情
 * @property integer $user_count 参与活动总人数
 * @property integer $user_id 活动创建者
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventUser[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereEventImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereBeginTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereEndTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereUserCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    public function getEventImageAttribute($value)
    {
        return get_image_url($value);
    }

    public function getEventTimeAttribute($value)
    {
        return $this->begin_time . ' 到 ' . $this->end_time;
    }
}
