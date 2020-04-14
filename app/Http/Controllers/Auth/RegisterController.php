<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


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
        /*return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:30'],
            'username' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['numeric','required','digits:10','min:0'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'token' => ['required','string','min:8','max:12'],
        ]);*/
            

        $messages = [
            'name.required' => 'Debe ingresar su nombre(s)',
            'name.string' => 'Caracteres no válidos',
            'name.max' => 'Se han introducido demasiados caracteres, acorte su nombre',  
            'last_name.required' => 'Debe ingresar su primer apellido',
            'last_name.string' => 'Caracteres no válidos',
            'last_name.max' => 'Se han introducido demasiados caracteres, acorte su apellido',
            'username.required' => 'Se requiere su nombre de usuario',
            'username.string' => 'Caracteres no válidos',
            'username.max' => 'Máximo 15 caracteres',
            'email.required' => 'Es necesario proporcionar un email',
            'email.string' => 'Caracteres no validos',
            'email.email' => 'Ingrese un correo válido',
            'email.max' => 'Máximo 50 caracteres',
            'phone_number.required' => 'Se requiere un número de teléfono',
            'phone_number.numeric' => 'Solo se admiten números',
            'phone_number.digits' => 'Deben de ser los 10 dígitos de su teléfono',
            'password.required' => 'Es necesario que ingrese una contraseña',
            'password.string' => 'Caracteres no válidos',
            'password.min' => 'Se requiere una contraseña de mínimo 8 caracteres',
            'password.confirmed' => 'Las contraseñas no son identicas, verifique nuevamente',
            'token.required' => 'Por favor ingrese el token',
            'token.string' => 'Caracteres no válidos',
            'token.min' => 'Ingrese completo el token',
            'token.max' => 'Token no válido',
        ];
        $rules = [
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:30',
            'username' => 'required|string|max:15',
            'email' => 'required|string|email|max:50|unique:users',
            'phone_number' => 'required|numeric|digits:10',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required|string|min:8|max:12',
        ];
        //$this->validate($data, $rules, $messages);*/
        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        //dd($data['token']);

        try{
            return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'typeUser' => 'ADMIN',
            'password' => Hash::make($data['password']),
            'token' => $data['token'],

            
            ]);
        }catch(Exception $e){
            //echo '$e';
        }
        
    }
}
