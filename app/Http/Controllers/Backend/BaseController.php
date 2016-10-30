<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class BaseController extends Controller {


    protected  $repository;

    public function __construct()
    {
        // $this->middleware('auth.admin');
    }
}
