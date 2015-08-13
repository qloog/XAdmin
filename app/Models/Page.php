<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'created_at',
        'updated_at'
    ];

	//
    public function hasManyComments()
    {
        return $this->hasMany('App\Models\Comment', 'page_id', 'id');
    }

}
