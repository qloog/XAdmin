<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property integer $id
 * @property integer $category_id 所属分类id
 * @property string $title 新闻标题
 * @property string $meta_keyword 页面关键词
 * @property string $meta_description 页面描述
 * @property string $page_image 页面缩略图
 * @property string $summary 摘要
 * @property string $content 正文
 * @property integer $views 浏览量
 * @property integer $user_id 发布者id
 * @property boolean $status 发布状态
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\NewsCategory $category
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereMetaKeyword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereMetaDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News wherePageImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereSummary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereViews($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'category_id',
        'page_image',
        'content',
        'meta_keyword',
        'meta_description',
        'summary',
        'views',
        'user_id',
        'status',
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
     * The one-to-one relationship between news and users.
     *
     * @return BelongsToMany
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * The many-to-many relationship between news and tags.
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'news_tags_pivot');
    }

    /**
     * Sync tag relation adding new tags as needed
     *
     * @param array $tags
     */
    public function syncTags(array $tags)
    {
        Tag::addNeededTags($tags);

        if (count($tags)) {
            $this->tags()->sync(
                Tag::whereIn('tag', $tags)->lists('id')->all()
            );
            return;
        }

        $this->tags()->detach();
    }

    public function getPageImageAttribute($value)
    {
        return $value ? get_image_url($value) : '';
    }

//    public function getStatusAttribute($value)
//    {
//        return $value == 1 ? '正常' : '已删除';
//    }

}
