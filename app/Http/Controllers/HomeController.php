<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\InfoData;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if( Auth::user()->rol_id == 1){

            $links = InfoData::get();
            return view('home',compact('links'));
        }
        if( Auth::user()->rol_id == 2){
            
        }
        
    }
}
