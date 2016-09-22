<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Album
 *
 * @property integer $id
 * @property string $name 相册名
 * @property string $desc 相册描述
 * @property string $album_type 相册类型，比如：人物、家居等
 * @property string $cover_image 封面图片
 * @property integer $photo_count 照片数
 * @property integer $user_id 所属用户
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Album whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Album whereAlbumName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Album whereAlbumDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Album whereAlbumType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Album whereCoverImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Album wherePhotoCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Album whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Album whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Album whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Album extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'albums';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'cover_image',
        'photo_count',
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
     * The one-to-many relationship between image and users.
     *
     * @return BelongsToMany
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * 获取图片全路径
     *
     * @param $value
     * @return string
     */
    public function getCoverImageAttribute($value)
    {
        return get_image_url($value);
    }
}
