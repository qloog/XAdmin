<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Category;

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
