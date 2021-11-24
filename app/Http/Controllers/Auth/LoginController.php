<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo(){
         if (auth()->user()->role == 0) {
            $cursos = Curso::all()->where('tipo','inter');
            return route('home');
         } else if (auth()->user()->role == 1) {
            return route('becarios.home');
         } else{
            return route('admin.index');
         }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, 
        [
            'email' => ['required'],
            'password' => ['required'],
        ],
        [
            'email.required'=>'Por favor ingresa tu correo electrónico',
            'password.required'=>'Por favor crea una contraseña',
        ]
        );
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
