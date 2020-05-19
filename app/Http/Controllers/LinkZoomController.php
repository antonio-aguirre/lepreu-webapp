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
       //
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
        //Validar datos
        $messages = [
            'data.digits' => 'No se ha capturado el ID correctamente',
            'data.required' => 'Es necesario que ingrese el ID',
            'data.min' => 'No se admiten ID negativos',  
            'data.numeric' => 'Solo se admiten números, revise nuevamente',         
        ];
        $rules = [
            'data' => 'numeric|required|min:0|digits:10',
        ];
        $this->validate($request, $rules, $messages);

        $infoData = new InfoData();

        if( ((count(InfoData::where('status', 'Principal')->get())>0) && (($request->status) == 'Principal'))  )
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
                Session::flash('message','Se ha añadió el ID'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
                Session::flash('alert-class','alert alert-success');
                return back();

            }else
            {
                Session::flash('message','Se ha producido un inconveniente al añadir el ID'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
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
        //Validar datos
        $messages = [
            'data.digits' => 'No se ha capturado el ID correctamente',
            'data.required' => 'Es necesario que ingrese el ID',
            'data.min' => 'No se admiten ID negativos',  
            'data.numeric' => 'Solo se admiten números, revise nuevamente',         
        ];
        $rules = [
            'data' => 'numeric|required|min:0|digits:10',
        ];
        $this->validate($request, $rules, $messages);
        //si existe ya un ID Principal y se selecciona la opción "Principal"
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
                return back();
                   
            }
            if( $var2 == "Predicacion" )
            {
                $this->updateSECONDARY_ID_PRIMARY($request,$id);
                return back();  
            }
            if( $var2 == "Servicio" )
            {
                $this->updateSERVICE_ID_PRIMARY($request,$id);
                return back();  
            }
        }

        //si existe ya un ID Principal y se selecciona la opción "Predicacion"
        if( ((count(InfoData::where('status', 'Principal')->get())>0) && (($request->status) == 'Predicacion'))  )
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
                return back();
            }
            if( $var2 == "Predicacion" )
            {
                
                $this->updateSECONDARY_ID_SECONDARY($request,$id);
                return back();
            }
            if( $var2 == "Servicio" )
            {
                $this->updateSERVICE_ID_SECONDARY($request,$id);
                return back();  
            }
        }

        //si existe ya un ID Principal y se selecciona la opción "Reunión Servicio"
        if( ((count(InfoData::where('status', 'Principal')->get())>0) && (($request->status) == 'Servicio'))  )
        {
            // se extrae el status del ID a actualizar
            $var = InfoData::select('status')->where('id',''.$id.'')->get();
            foreach($var as $vars)
            {
                $var2 = $vars->status;
            }

            //si el ID que se quiere editar es el ID Principal
            if( $var2 == "Principal" )
            {
                $this->updatePRIMARY_ID_SERVICE($request,$id);
                return back();
            }
            if( $var2 == "Predicacion" )
            {
                $this->updateSECONDARY_ID_SERVICE($request,$id);
                return back();
            }
            if( $var2 == "Servicio" )
            {
                $this->updateSERVICE_ID_SERVICE($request,$id);
                return back();
            }
        }

        //si NO existe un ID Principal y se selecciona la opción "Principal"
        if( ((count(InfoData::where('status', 'Principal')->get()) <= 0) && (($request->status) == 'Principal'))  )
        {
            $status = InfoData::select('status')->where('id',''.$id.'')->get();
            $var = InfoData::select('data')->where('id',''.$id.'')->get();
            foreach($var as $vars)
            {
                $var2 = $vars->data;
            }
            foreach($status as $stats)
            {
                $stat = $stats->status;
            }

            // si el ID es el mismo que está en la base de datos
            if( $var2 == ($request->data) )
            {
                $new_type = InfoData::find($id);
                $new_type->status = $request->status;

                if($stat == "Servicio")
                {
                    $message = "Se ha actualizado ID de servicio a principal";
                    $badmessage = "Se ha producido un inconveniente en la actualización del ID de servicio a principal";
                }else{
                    $message = "Se ha actualizado ID Predicacion a principal";
                    $badmessage = "Se ha producido un inconveniente en la actualización del ID Predicacion a principal";
                }

                if($new_type->save()) {
                    Session::flash('message',''.$message.'');
                    Session::flash('alert-class','alert alert-success');   
                    return back();    
                }else
                {
                    Session::flash('message',''.$badmessage.'');
                    Session::flash('alert-class','alert alert-warning');
                    return back();
                }
            }else
            {
                $new_type_data = InfoData::find($id);
                $new_type_data->status = $request->status;
                $new_type_data->data = $request->data;

                if($new_type_data->save()) {
                    Session::flash('message','Se ha actualizado ID Predicacion a principal y actualizado su valor');
                    Session::flash('alert-class','alert alert-success');
                    return back();      
                }else
                {
                    Session::flash('message','Se ha producido un inconveniente en la actualización del ID a principal y su valor');
                    Session::flash('alert-class','alert alert-warning');
                    return back();
                }
            }
        }

        //si NO existe un ID Principal y se selecciona la opción "Predicacion"
        if( ((count(InfoData::where('status', 'Principal')->get()) <= 0) && (($request->status) == 'Predicacion'))  )
        {
            $var = InfoData::select('data')->where('id',''.$id.'')->get();
            foreach($var as $vars)
            {
                $var2 = $vars->data;
            }

            $status = InfoData::select('status')->where('id',''.$id.'')->get();
            foreach($var as $vars)
            {
                $var2 = $vars->data;
            }

            // si el ID es el mismo que está en la base de datos
            if( $var2 == ($request->data) )
            {
                Session::flash('message','No se realizó ninguna modificación');
                Session::flash('alert-class','alert alert-info');   
                return back();
            }else{
                $InfoData = InfoData::find($id);
                $InfoData->data = $request->data;

                if($InfoData->save()) {
                    Session::flash('message','Se ha actualizado ID');
                    Session::flash('alert-class','alert alert-success');
                    return back();      
                }else
                {
                    Session::flash('message','Se ha producido un inconveniente en la actualización del ID');
                    Session::flash('alert-class','alert alert-warning');
                    return back();
                }
            }
        }

        //si NO existe un ID Principal y se selecciona la opción "Reunión Servicio"
        if( ((count(InfoData::where('status', 'Principal')->get()) <= 0) && (($request->status) == 'Servicio'))  )
        {
            $var = InfoData::select('data')->where('id',''.$id.'')->get();
            foreach($var as $vars)
            {
                $var2 = $vars->data;
            }

            // si el ID es el mismo que está en la base de datos
            if( $var2 == ($request->data) )
            {
                $new_data = InfoData::find($id);
                $new_data->status = $request->status;
   
                $message = "Se ha añadido ID para reunión de servicio";
                $alert_class = "alert alert-info";

            }else{
                $new_data = InfoData::find($id);
                $new_data->data = $request->data;
                $new_data->status = $request->status;

                $message = "Se a actualizado ID y añadido para reunión de servicio";
                $alert_class = "alert alert-success";
            }

            if($new_data->save()) {
                Session::flash('message',''.$message.'');
                Session::flash('alert-class',''.$alert_class.'');
                return back();      
            }else
            {
                Session::flash('message','Se ha producido un inconveniente en la actualización del ID');
                Session::flash('alert-class','alert alert-warning');
                return back();
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

        //se busca el ID del actual "principal" para cambiarlo a "Predicacion"
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
            $idPrincipal_before->status = 'Predicacion';

            $idPrincipal_after = InfoData::find($id);
            $idPrincipal_after->status = $request->status;

            $message = 'Se a actualizado el ID Predicacion a principal';

        }else
        {
            $idPrincipal_before = InfoData::find($idPrincipal);
            $idPrincipal_before->status = 'Predicacion';

            $idPrincipal_after = InfoData::find($id);
            $idPrincipal_after->data = $request->data;
            $idPrincipal_after->status = $request->status;

            $message = 'Se a actualizado el ID principal y modificado su valor';
        }

        if(($idPrincipal_before->save()) && ($idPrincipal_after->save()) ) {
            Session::flash('message',''.$message.'');
            Session::flash('alert-class','alert alert-success');
        }else{
            Session::flash('message','Se ha producido un inconveniente en la modificación a ID principal');
            Session::flash('alert-class','alert alert-warning');
        }
    }

    public function updateSERVICE_ID_PRIMARY ($request,$id)
    {
        //se obtiene el valor actual del ID a modificar
        $var = InfoData::select('data')->where('id',''.$id.'')->get();
        foreach($var as $vars)
        {
            $var2 = $vars->data;
        }

        //se busca el ID del actual "principal" para cambiarlo a "Servicio"
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
            $idPrincipal_before->status = 'Predicacion';

            $idPrincipal_after = InfoData::find($id);
            $idPrincipal_after->status = $request->status;

            $message = 'Se a actualizado el ID principal';

        }else
        {
            $idPrincipal_before = InfoData::find($idPrincipal);
            $idPrincipal_before->status = 'Predicacion';

            $idPrincipal_after = InfoData::find($id);
            $idPrincipal_after->data = $request->data;
            $idPrincipal_after->status = $request->status;

            $message = 'Se a actualizado el ID principal y modificado su valor';
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
                Session::flash('message','Se ha cambiado ID principal a Predicacion. No hay ID principal registrado');
                Session::flash('alert-class','alert alert-info');
                var_dump("Primary to Secondary");
            }else{
                Session::flash('message','Se ha producido un inconveniente en la actualización del ID principal a Predicacion');
                Session::flash('alert-class','alert alert-warning');
            }
            
        }else
        {
            $new_ID = InfoData::find($id);
            $new_ID->data = $request->data;
            $new_ID->status = $request->status;

            if($new_ID->save()) {
                Session::flash('message','Se ha modificado su valor y cambiado ID principal a Predicacion. No hay ID principal registrado');
                Session::flash('alert-class','alert alert-info');       
            }else
            {
                Session::flash('message','Se ha producido un inconveniente en la actualización del ID principal a Predicacion');
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
                Session::flash('message','Se ha actualizado el valor del ID Predicacion');
                Session::flash('alert-class','alert alert-success');       
            }else
            {
                Session::flash('message','Se ha producido un inconveniente en la actualización del ID Predicacion');
                Session::flash('alert-class','alert alert-warning');
            }
        }
    }

    public function updateSERVICE_ID_SECONDARY ($request,$id)
    {
        $var = InfoData::select('data')->where('id',''.$id.'')->get();
        foreach($var as $vars)
        {
            $var2 = $vars->data;
        }

        $InfoData = InfoData::find($id);

        // si el ID es el mismo que está en la base de datos
        if( $var2 == ($request->data) )
        {
            $InfoData->status = $request->status;
            $message = "Se cambio el ID de servicio a Predicacion. No se modificó su valor.";
            $alert_class = "alert alert-info";

        }else{
            
            $InfoData->data = $request->data;
            $InfoData->status = $request->status;
            
            $message = "Se a actualizado el ID de servicio a Predicacion y también modificado su valor.";
            $alert_class = "alert alert-info";
        }
        
        if($InfoData->save()) {
            Session::flash('message',''.$message.'');
            Session::flash('alert-class',''.$alert_class.'');       
        }else
        {
            Session::flash('message','Se ha producido un inconveniente en la actualización del ID de servicio a Predicacion');
            Session::flash('alert-class','alert alert-warning');
        }
    }

    public function updatePRIMARY_ID_SERVICE ($request,$id)
    {
        $var = InfoData::select('data')->where('id',''.$id.'')->get();
        foreach($var as $vars)
        {
            $var2 = $vars->data;
        }

        //se busca que no haya otro ID de servicio
        if( count(InfoData::where('status', 'Servicio')->get()) > 0 )
        {
            Session::flash('message','Ya hay un ID para reunión de servicio registrado. No se modificó nada.');
            Session::flash('alert-class','alert alert-info');
        }else
        {
            // si el ID es el mismo que está en la base de datos
            if( $var2 == ($request->data) )
            {
                $InfoData = InfoData::find($id);
                $InfoData->status = $request->status;

                $message = "Se ha cambiado ID principal para reunión de servicio, sin modificar su valor. No hay ID principal registrado";
                $session_alert = "alert alert-info";
                
            }else
            {
                $InfoData = InfoData::find($id);
                $InfoData->data = $request->data;
                $InfoData->status = $request->status;

                $message = "Se ha modificado el valor y cambiado ID principal para reunión de servicio. No hay ID principal registrado";
                $session_alert = "alert alert-info";
            }

            if( $InfoData->save() ) {
                Session::flash('message',''.$message.'');
                Session::flash('alert-class',''.$session_alert.'');       
            }else{
                Session::flash('message','Se ha producido un inconveniente en la actualización del ID principal a reunión de servicio');
                Session::flash('alert-class','alert alert-warning');
            }
        }
    }

    public function updateSECONDARY_ID_SERVICE ($request,$id)
    {
        $var = InfoData::select('data')->where('id',''.$id.'')->get();
        foreach($var as $vars)
        {
            $var2 = $vars->data;
        }

        // si el ID es el mismo que está en la base de datos
        if( $var2 == ($request->data) )
        {
            $InfoData = InfoData::find($id);
            $InfoData->status = $request->status;
            
            $message = "Se actualizo el ID Predicacion para reunión de servicio. No se modifico su valor.";
            $session_alert = "alert alert-info";

        }else{
            $InfoData = InfoData::find($id);
            $InfoData->data = $request->data;
            $InfoData->status = $request->status;

            $message = "Se actualizo ID Predicacion para reunión de servicio. Se modificó su valor";
            $session_alert = "alert alert-success";
        }

        if( $InfoData->save() ) {
            Session::flash('message',''.$message.'');
            Session::flash('alert-class',''.$session_alert.'');       
        }else{
            Session::flash('message','Se ha producido un inconveniente en la actualización del ID Predicacion a de servicio');
            Session::flash('alert-class','alert alert-warning');
        }
        
    }

    public function updateSERVICE_ID_SERVICE ($request,$id)
    {
        $var = InfoData::select('data')->where('id',''.$id.'')->get();
        foreach($var as $vars)
        {
            $var2 = $vars->data;
        }

        // si el ID es el mismo que está en la base de datos
        if( $var2 == ($request->data) )
        {
            Session::flash('message','No se cambió tipo de ID ni su valor. No se modificó nada al ID de servicio');
            Session::flash('alert-class','alert alert-info');

        }else{
            $new_ID = InfoData::find($id);
            $new_ID->data = $request->data;

            if($new_ID->save()) {
                Session::flash('message','Se actualizó el ID de servicio');
                Session::flash('alert-class','alert alert-success');       
            }else
            {
                Session::flash('message','Se ha producido un inconveniente en la actualización del ID para reunión de servicio');
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
          return back();
        }else
        {
            Session::flash('message','Se ha produciodo un inconveniente');
            Session::flash('alert-class','alert alert-warning');
            return back();

        }
    }
}
