<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Image
 *
 * @property integer $id
 * @property string $image_name 图片名，经过str_random函数处理
 * @property string $image_path 图片存储的实际路径
 * @property integer $user_id 用户id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\NewsCategory $category
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereImageName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereImagePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_name',
        'image_path',
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

    /**
     * Get the category that owns the news.
     * The one-to-one relationship between news and category.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\NewsCategory');
    }

    /**
     * The one-to-many relationship between image and users.
     *
     * @return BelongsToMany
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
