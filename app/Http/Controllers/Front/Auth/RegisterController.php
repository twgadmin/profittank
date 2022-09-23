<?php

namespace App\Http\Controllers\Front\Auth;

// use App\User;
// use App\Models\Country;
use App\Models\User;
use App\Http\Controllers\Front\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
            'first_name'      => ['required', 'string', 'max:50'],
            'last_name'       => ['required', 'string', 'max:50'],
            'company_name'    => ['required', 'string', 'max:50'],
            'phone_num'       => ['required', 'string', 'max:50'],
            'mobile_num'      => ['required', 'string', 'max:50'],
            'termsofservices' => ['required', 'string', 'max:50'],
            'user_type'       => ['required', 'numeric'],
            'email'           => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password'        => ['required','min:8',
            'regex:/[a-z]/',
            'regex:/[A-Z]/',
            'regex:/[0-9]/',
            'regex:/[@$!%*#?&]/',
            'confirmed'
             ],
            'password_confirmation'=> ['required','min:8', // must be at least 8 characters in length
            'regex:/[a-z]/', // must contain at least one lowercase letter
            'regex:/[A-Z]/', // must contain at least one uppercase letter
            'regex:/[0-9]/', // must contain at least one digit
            'regex:/[@$!%*#?&]/' // must contain a special character   
            ],

            ],
            [
            'password.required' => 'The password field is required.',
            'password.min'      => 'The password must be at least 8 characters in length.',
            'password.regex' => 'The password must contain at least one uppercase letter or lowercase letter or at least one digit or a special character.',
            'user_type.required' => 'Please select a valid user type.',
            'user_type.numeric'  => 'Please select a valid user type.',
            'user_type.max'      => 'Please select a valid user type.',
            
            ] 

        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {

        return User::create([
            'first_name'      => $data['first_name'],
            'last_name'       => $data['last_name'],
            'company_name'    => $data['company_name'],
            'phone_num'       => $data['phone_num'],
            'mobile_num'      => $data['mobile_num'],
            'email'           => $data['email'],
            'termsofservices' => $data['termsofservices'],
            'user_type'       => $data['user_type'],
            'status'          => 1,
            'password'        => bcrypt($data['password']),
        ]);
    }
}
