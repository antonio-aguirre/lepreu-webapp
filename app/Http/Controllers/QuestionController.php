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
        //return view('Partials.form.formFAQ');
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
            'description' => 'required|max:400',
        ];
        $this->validate($request, $rules, $messages);

        $device = $this->devicechk($request); //verificará cuales checkboxes de los dispositivos están activados
        $OS = $this->OSchk($request); //verificará cuales checkboxes de los OS están activados
        
        $question = new Question();

        $question->age = $request->age;
        $question->device = $device;
        $question->operative_system = $OS;
        $question->description = $request->description;

        if($question->save())
        {
            Session::flash('message','Se ha registrado su duda, pronto se le dará seguimiento'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert alert-success');
            //return redirect('/admin/products');
            return redirect('/index');

        }else
        {
            Session::flash('message','Se ha producido un inconveniente en el registro'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert alert-warning');
            //return redirect('/admin/products');
            return redirect('/index');
        }

    }

    public function devicechk($request)
    {
        //los 3 activados
        if(( ($request->input('device1')) && ($request->input('device2')) && ($request->input('device3')) ) != null)
            return $value = 'celular,tablet y computadora';

        //celular y tablet activos
        if(( ($request->input('device1')) && ($request->input('device2')) ) != null )
            return $value = 'celular y tablet';

        //celular y computadora activos
        if(( ($request->input('device1')) && ($request->input('device3')) ) != null)
            return $value = 'celular y computadora';

        //tablet y computadora activos
        if(( ($request->input('device2')) && ($request->input('device3')) ) != null)
            return $value = 'tablet y computadora';

        //celular activo
        if((($request->input('device1'))) != null)
            return $value = 'celular';
        //tablet activo
        if((($request->input('device2'))) != null)
            return $value = 'tablet';
        //computadora activo
        if((($request->input('device3'))) != null)
            return $value = 'computadora';

        //ninguno activo
        if(( ($request->input('device1')) && ($request->input('device2')) && ($request->input('device3')) ) == null)
            return $value = 'Dispositivo no registrado';
    }

    public function OSchk($request)
    {
        //todos seleccionados
        if(( ($request->input('OS1')) && ($request->input('OS2')) && ($request->input('OS3')) && ($request->input('OS4')) ) != null)
            return $value = 'Android, iOS/macOS, Windows y Kindle';

        //Andorid, iOS y Windows seleccionados
        if(( ($request->input('OS1')) && ($request->input('OS2')) && ($request->input('OS3')) ) != null)
            return $value = 'Android, iOS/macOS y Windows';
        
        //Android, iOS y Kindle seleccionados
        if(( ($request->input('OS1')) && ($request->input('OS2')) && ($request->input('OS4')) ) != null)
            return $value = 'Andorid, iOS/macOS y Kindle';
        
        //Android, Windows y Kindle seleccionados
        if(( ($request->input('OS1')) && ($request->input('OS3')) && ($request->input('OS4')) ) != null )
            return $value = 'Andorid, Windows y Kindle';

        //iOS, Windows y Kindle
        if(( ($request->input('OS2')) && ($request->input('OS3')) && ($request->input('OS4')) ) !=null)
            return $value = 'iOS/macOS, Windows y Kindle';

        //Android y iOS seleccionados
        if(( ($request->input('OS1')) && ($request->input('OS2')) ) != null )
            return $value = 'Android y iOS/macOS';

        //Android y Windows seleccionados
        if(( ($request->input('OS1')) && ($request->input('OS3'))) != null)
            return $value = 'Android y Windows';

        //Andorid y Kindle seleccionados
        if(( ($request->input('OS1')) && ($request->input('OS4')) ) != null)
            return $value = 'Android y Kindle';

        //iOS y Windows seleccionados
        if(( ($request->input('OS2')) && ($request->input('OS3')) ) != null)
            return $value = 'iOS/macOS y Windows';
        
        //iOS y Kindle seleccionados
        if(( ($request->input('OS2')) && ($request->input('OS4'))) != null)
            return $value = 'iiOS/macOSOS y Kindle';

        //Kindle y Windows seleccionados
        if(( ($request->input('OS3')) && ($request->input('OS4')) ) != null)
            return $value = 'Kindle y Windows';

        //Android seleccionado
        if((($request->input('OS1')) ) != null)
            return $value = 'Android';
        //iOS seleccionado
        if((($request->input('OS2')) ) != null)
            return $value = 'iOS/macOS';
        //Windows seleccionado
        if((($request->input('OS3')) ) != null)
            return $value = 'Windows';
        //Kindle seleccionado
        if((($request->input('OS4')) ) != null)
            return $value = 'Kindle';

        //ninguno seleccionados
        if(( ($request->input('OS1')) && ($request->input('OS2')) && ($request->input('OS3')) && ($request->input('OS4')) ) == null)
            return $value = 'No se selecciono Sistema Operativo';
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
        if(Question::destroy($id))
        {
        Session::flash('message','Registro removido');
          Session::flash('alert-class','alert-success');
          return redirect('/home');
        }
        else
        {
            Session::flash('message','Se ha produciodo un inconveniente al remover regístro');
            Session::flash('alert-class','alert-warning');
            return redirect('/home');
        }
    }
}
