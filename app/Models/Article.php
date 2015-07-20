<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	//
    protected $fillable = [
        'title',
        'body',
        'slug',
        'user_id'
    ];

    function show()
    {
        dd(11);
    }

}
