<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserRequestActivationEmail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'country' => 'required_with:phone',
            'phone' => 'phone:country',
            'company_name' => 'required|max:100'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'active' => false,
            'activation_token' => str_random(255),
        ]);
        $user->assignRole('admin');
        $domain_name = substr(strrchr($data['email'], "@"), 1);
        $company = $user->companies()->create([
            'name' => $data['company_name'],
            'domain' => $domain_name,
            'uuid' => Str::uuid(),
            'secret_key' => sodium_crypto_secretbox_keygen(),
        ]);

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        event(new UserRequestActivationEmail($user));

        $this->guard()->logout();

        return redirect($this->redirectTo)
            ->with('status','Du må bekrefte e-posten din før du kan logge inn. Sjekk e-posten din og klikk
            på aktiveringslenken.');

    }
}
