<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Question;
Use Session;

class QuestionController extends Controller
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
        return view('Partials.form.formFAQ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar datos
        $messages = [
            'description.required' => 'ES NECESARIO QUE SE HAGA LLEGAR A SABER SU DUDA, ESCRIBALA A CONTINUACIÓN',
            'description.max' => 'Se debe de tener un máximo de 400 caracteres',  
        ];
        $rules = [
            'description' => 'required|max:400'
        ];
        $this->validate($request, $rules, $messages);

        $question = new Question();

        $question->congregation = $request->congregation;
        $question->description = $request->description;


        if($question->save())
        {
            Session::flash('message','Se ha registrado su duda, pronto se le dará seguimiento'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert alert-success');
            //return redirect('/admin/products');
            return redirect('/dudas-zoom/add');

        }else
        {
            Session::flash('message','Se ha producido un inconveniente en el registro'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert alert-warning');
            //return redirect('/admin/products');
            return redirect('/dudas-zoom/add');
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
