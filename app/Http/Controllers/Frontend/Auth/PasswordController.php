<?php namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @internal param Guard $auth
     * @internal param PasswordBroker $passwords
     * @return \App\Http\Controllers\Frontend\Auth\PasswordController
     */
	public function __construct()
	{
		$this->middleware('guest');
	}

}
