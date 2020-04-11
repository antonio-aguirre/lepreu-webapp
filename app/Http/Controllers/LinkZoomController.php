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
