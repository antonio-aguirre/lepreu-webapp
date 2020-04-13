<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoData;
use Session;

class LinkZoomController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = InfoData::get();                      

        //dd($links);
        return view('Partials.ADMINPANEL.sections.linkZoom',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $infoData = new InfoData();

        //dd(((count(InfoData::where('status', 'Principal')->get())>0)  && (($request->input('status')) == 'Principal')));
        
        if( ((count(InfoData::where('status', 'Principal')->get())>0) && (($request->input('status')) == 'Principal'))  )
        {
            Session::flash('message','Ya hay un link principal, cambie el tipo'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert alert-warning');
            //return redirect('/admin/products');
            return back();
        }
        else
        {
            $infoData->value = $request->value;//identificador de lo que se guardará
            $infoData->data = $this->valueToStore($request); // información que se guardará
            $infoData->description = $request->description; //descripción de lo que se guardará
            $infoData->status = $request->status; 

            if($infoData->save())
            {
                Session::flash('message','Se ha añadió la información'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
                Session::flash('alert-class','alert alert-success');
                return back();

            }else
            {
                Session::flash('message','Se ha producido un inconveniente al añadir la información'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
                Session::flash('alert-class','alert alert-warning');
                return back();
            }
        }
        
        
    }

    public function valueToStore($request)
    {
        if(($request->input('value')) == 'LINK-ZOOM' ){
            
            return $request->input('data');
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
        //si existe ya un ID primario y se selecciona la opción "Principal"
        if( ((count(InfoData::where('status', 'Principal')->get())>0) && (($request->status) == 'Principal'))  )
        {
            $var = InfoData::select('status')->where('id',''.$id.'')->get();
            foreach($var as $vars)
            {
                $var2 = $vars->status;
            }

            //si el ID que se quiere editar es el ID Principal
            if( $var2 == "Principal" )
            {
                $this->updatePRIMARY_ID_PRIMARY($request,$id);
                return redirect('/link-zoom');
                   
            }else
            {
                $this->updateSECONDARY_ID_PRIMARY($request,$id);
                return redirect('/link-zoom');  
            }
        }

        //si existe ya un ID Principal y se selecciona la opción "Secundario"
        if( ((count(InfoData::where('status', 'Principal')->get())>0) && (($request->status) == 'Secundario'))  )
        {
            $var = InfoData::select('status')->where('id',''.$id.'')->get();
            foreach($var as $vars)
            {
                $var2 = $vars->status;
            }

            //si el ID que se quiere editar es el ID Principal
            if( $var2 == "Principal" )
            {
                $this->updatePRIMARY_ID_SECONDARY($request,$id);
                return redirect('/link-zoom');
            }else
            {
                
                $this->updateSECONDARY_ID_SECONDARY($request,$id);
                return redirect('/link-zoom');
            }
        }

        //si NO existe un ID primario y se selecciona la opción "Principal"
        if( ((count(InfoData::where('status', 'Principal')->get()) <= 0) && (($request->status) == 'Principal'))  )
        {
            $var = InfoData::select('data')->where('id',''.$id.'')->get();
            foreach($var as $vars)
            {
                $var2 = $vars->data;
            }

            // si el ID es el mismo que está en la base de datos
            if( $var2 == ($request->data) )
            {
                $new_type = InfoData::find($id);
                $new_type->status = $request->status;

                if($new_type->save()) {
                    Session::flash('message','Se ha actualizado ID secundario a principal');
                    Session::flash('alert-class','alert alert-success');   
                    return redirect('/link-zoom');    
                }else
                {
                    Session::flash('message','Se ha producido un inconveniente en la actualización del ID a principal');
                    Session::flash('alert-class','alert alert-warning');
                    return redirect('/link-zoom');
                }
            }else
            {
                $new_type_data = InfoData::find($id);
                $new_type_data->status = $request->status;
                $new_type_data->data = $request->data;

                if($new_type_data->save()) {
                    Session::flash('message','Se ha actualizado ID secundario a principal y actualizado su valor');
                    Session::flash('alert-class','alert alert-success');
                    return redirect('/link-zoom');      
                }else
                {
                    Session::flash('message','Se ha producido un inconveniente en la actualización del ID a principal y su valor');
                    Session::flash('alert-class','alert alert-warning');
                    return redirect('/link-zoom');
                }
            }
        }

        //si NO existe un ID primario y se selecciona la opción "Secundario"
        if( ((count(InfoData::where('status', 'Principal')->get()) <= 0) && (($request->status) == 'Secundario'))  )
        {
            $var = InfoData::select('data')->where('id',''.$id.'')->get();
            foreach($var as $vars)
            {
                $var2 = $vars->data;
            }

            // si el ID es el mismo que está en la base de datos
            if( $var2 == ($request->data) )
            {
                Session::flash('message','No se realizó ninguna modificación');
                Session::flash('alert-class','alert alert-info');   
                return redirect('/link-zoom');
            }else{
                $new_data = InfoData::find($id);
                $new_data->data = $request->data;

                if($new_data->save()) {
                    Session::flash('message','Se ha actualizado ID');
                    Session::flash('alert-class','alert alert-success');
                    return redirect('/link-zoom');      
                }else
                {
                    Session::flash('message','Se ha producido un inconveniente en la actualización del ID');
                    Session::flash('alert-class','alert alert-warning');
                    return redirect('/link-zoom');
                }
            }
        }
    }

    public function updatePRIMARY_ID_PRIMARY ($request,$id)
    {
        $var = InfoData::select('data')->where('id',''.$id.'')->get();
        foreach($var as $vars)
        {
            $var2 = $vars->data;
        }

        // si el ID es el mismo que está en la base de datos
        if( $var2 == ($request->data) )
        {
            Session::flash('message','El ID YA es el Principal, no se modificó nada');
            Session::flash('alert-class','alert alert-info');
        }else
        {
            $new_ID = InfoData::find($id);
            $new_ID->data = $request->data;

            if($new_ID->save()) {
                Session::flash('message','Se ha actualizado el valor del ID principal');
                Session::flash('alert-class','alert alert-success');       
            }else
            {
                Session::flash('message','Se ha producido un inconveniente en la actualización del ID principal');
                Session::flash('alert-class','alert alert-warning');
            }
        }
    }

    public function updateSECONDARY_ID_PRIMARY ($request,$id)
    {
        $var = InfoData::select('data')->where('id',''.$id.'')->get();
        foreach($var as $vars)
        {
            $var2 = $vars->data;
        }

        //se busca el ID del actual "principal2 para cambiarlo a "secundario"
        $var3 = InfoData::select('id')->where('status', 'Principal')->get();
        foreach($var3 as $vars2)
        {
            $idPrincipal = $vars2->id;
        }

        // si el ID es el mismo que ya está en la base de datos
        if( $var2 == ($request->data) )
        {
            // actualización de status del antiguo ID principal
            $idPrincipal_before = InfoData::find($idPrincipal);
            $idPrincipal_before->status = 'Secundario';

            $idPrincipal_after = InfoData::find($id);
            $idPrincipal_after->status = $request->status;

            $message = 'Se a cambiado el ID principal';

        }else
        {
            $idPrincipal_before = InfoData::find($idPrincipal);
            $idPrincipal_before->status = 'Secundario';

            $idPrincipal_after = InfoData::find($id);
            $idPrincipal_after->data = $request->data;
            $idPrincipal_after->status = $request->status;

            $message = 'Se a cambiado el ID principal y modificado su valor';
        }

        if(($idPrincipal_before->save()) && ($idPrincipal_after->save()) ) {
            Session::flash('message',''.$message.'');
            Session::flash('alert-class','alert alert-success');
        }else{
            Session::flash('message','Se ha producido un inconveniente en la modificación a ID principal');
            Session::flash('alert-class','alert alert-warning');
        }
    }

    public function updatePRIMARY_ID_SECONDARY ($request,$id)
    {
        $var = InfoData::select('data')->where('id',''.$id.'')->get();
        foreach($var as $vars)
        {
            $var2 = $vars->data;
        }

        // si el ID es el mismo que está en la base de datos
        if( $var2 == ($request->data) )
        {
            $new_status = InfoData::find($id);
            $new_status->status = $request->status;

            if($new_status->save())
            {
                Session::flash('message','Se ha cambiado ID principal a secundario. No hay ID principal registrado');
                Session::flash('alert-class','alert alert-info');
            }else{
                Session::flash('message','Se ha producido un inconveniente en la actualización del ID principal a secundario');
                Session::flash('alert-class','alert alert-warning');
            }
            
        }else
        {
            $new_ID = InfoData::find($id);
            $new_ID->data = $request->data;
            $new_ID->status = $request->status;

            if($new_ID->save()) {
                Session::flash('message','Se ha modificado su valor y cambiado ID principal a secundario. No hay ID principal registrado');
                Session::flash('alert-class','alert alert-info');       
            }else
            {
                Session::flash('message','Se ha producido un inconveniente en la actualización del ID principal a secundario');
                Session::flash('alert-class','alert alert-warning');
            }
        }
    }

    public function updateSECONDARY_ID_SECONDARY ($request,$id)
    {
        $var = InfoData::select('data')->where('id',''.$id.'')->get();
        foreach($var as $vars)
        {
            $var2 = $vars->data;
        }

        // si el ID es el mismo que está en la base de datos
        if( $var2 == ($request->data) )
        {
            Session::flash('message','No se cambió tipo de ID ni valor. No se modificó nada');
            Session::flash('alert-class','alert alert-info');

        }else{
            $new_ID = InfoData::find($id);
            $new_ID->data = $request->data;

            if($new_ID->save()) {
                Session::flash('message','Se ha actualizado el valor del ID secundario');
                Session::flash('alert-class','alert alert-success');       
            }else
            {
                Session::flash('message','Se ha producido un inconveniente en la actualización del ID secundario');
                Session::flash('alert-class','alert alert-warning');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(InfoData::destroy($id)) {
          Session::flash('message','Se ha eliminado el link');
          Session::flash('alert-class','alert alert-success');
          return redirect('/link-zoom');
        }else
        {
            Session::flash('message','Se ha produciodo un inconveniente');
            Session::flash('alert-class','alert alert-warning');
            return redirect('/link-zoom');

        }
    }
}
