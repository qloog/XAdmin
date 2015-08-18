<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
