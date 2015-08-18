<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany('App\Models\Tag', 'news_tag_pivot');
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
        return get_image_url($value);
    }

//    public function getStatusAttribute($value)
//    {
//        return $value == 1 ? '正常' : '已删除';
//    }

}
