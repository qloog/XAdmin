<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

    protected $loginPath = '/admin/login';
    protected $redirectPath = '/admin/dashboard';
    protected $redirectAfterLogout = '/admin/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return \App\Http\Controllers\Backend\Auth\AuthController
     */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('backend.auth.login');
    }

}
