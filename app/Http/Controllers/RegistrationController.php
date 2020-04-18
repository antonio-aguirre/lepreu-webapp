<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use Session;
use App\Token;
use App\User;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'token' => 'required|string|min:8|max:15',
        ];
        $this->validate($request, $rules, $messages);


        if( (count(Token::where('token',''.$request->token.'')->get()) > 0) && (count(Token::where('status','USED')->where('token',''.$request->token.'')->get()) == 0))
        {
            $varID = Token::select('id')->where('token',''.$request->token.'')->get();
            foreach($varID as $varsID)
            {
                $tokenID = $varsID->id;
            }

            $this->changeTokenStatus($tokenID);

            // Registra type anciano o ADMIN (15 lenght)
            if(strlen($request->token) == 10)
            {
                $this->registerAnciano($request,$tokenID);
                return redirect('/home');

            }else
            {
                $this->registerAdmin($request,$tokenID);
                return redirect('/home');
            }

        }else{

            Session::flash('message','No se ha podido validar correctamente los datos, intente de nuevo'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert alert-warning');
            return redirect('/registeruser/add');
        }

    }

    public function changeTokenStatus($tokenID)
    {
        $changeStatus = Token::find($tokenID);
        $changeStatus->status = 'USED';
        $changeStatus->save();
    }

    public function registerAnciano($request,$tokenID)
    {
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->token_id = $tokenID;
        $user->rol_id = '2';

        if($user->save())
        {
            auth()->login($user);
            Session::flash('message','Se ha registrado, Bienvenido'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert alert-success');
        }else
        {
            Session::flash('message','Se ha producido un inconveniente en el registro'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert alert-warning');
        }
    }

    public function registerAdmin($request,$tokenID)
    {
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->token_id = $tokenID;
        $user->rol_id = '1';

        if($user->save())
        {
            auth()->login($user);
            Session::flash('message','Se ha registrado, Bienvenido'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert alert-success');
        }else
        {
            Session::flash('message','Se ha producido un inconveniente en el registro'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert alert-warning');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
