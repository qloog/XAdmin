<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EventUser
 *
 * @property integer $id
 * @property integer $event_id 活动id
 * @property integer $user_id 参与者id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EventUser whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EventUser whereEventId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EventUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EventUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EventUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'user_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

}
