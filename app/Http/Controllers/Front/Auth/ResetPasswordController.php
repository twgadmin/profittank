<?php

namespace App\Http\Controllers\Front\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Password;
use Auth;

class ResetPasswordController extends Controller
{
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
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web');
        parent::__construct();
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    public function broker()
    {
        return Password::broker('users');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('frontend.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
