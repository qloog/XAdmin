<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	//
    public function hasManyComments()
    {
        return $this->hasMany('App\Models\Comment', 'page_id', 'id');
    }

}
