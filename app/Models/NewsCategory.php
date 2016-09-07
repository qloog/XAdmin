<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NewsCategory
 *
 * @property integer $id
 * @property string $name 分类名
 * @property integer $pid 父类id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\News[] $news
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsCategory wherePid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NewsCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewsCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'pid', 'created_at', 'updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the news for the blog category.
     */
    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

}
