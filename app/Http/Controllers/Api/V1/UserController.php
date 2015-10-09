<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Dingo\Api\Routing\Helpers;

class UserController extends BaseController
{

    use Helpers;

    public function __construct()
    {
        $this->middleware('api.auth');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);

        return $this->response->array($user->toArray());
    }

    public function index()
    {
        $user = $this->auth->user();

        return $user;
    }
}