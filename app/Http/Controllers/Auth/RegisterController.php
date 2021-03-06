<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make($data, 
        [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
      
            // 'gender' => ['required'],
            // 'aviso'=>['required']
        ],
        [
            'fname.required'=>'Por favor ingresa tu(s) nombre(s)',
            'lname.required'=>'Por favor ingresa tus apellidos',
            'email.required'=>'Por favor ingresa tu correo electrónico',
            'password.required'=>'Por favor crea una contraseña',
            'password.min'=>'La contraseña debe contener mínimo 8 caracteres',

            'password.confirmed'=>'Las contraseñas no coinciden, intenta de nuevo ',
           
            'gender.required'=>'Esta información se utilizará unicamente para fines estadísticos',
            'aviso.required' => 'Por favor lee nuestro Aviso de Privacidad',
        ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            //'origin' => $data['origin'],
            //'origin' => $data['Publico en general'], 
            'origin' => 'Publico en general',
            // 'gender' => $data['gender'],
            // 'aviso' => $data['aviso'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
