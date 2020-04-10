<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoData;
use Session;
use Stancl\Tenancy\Tenant;
use DB;

use Illuminate\Database\Eloquent\Model;

class ConfigController extends Controller
{
    public function configurations()
    {
        // recuperando el link de zoom para cargarlo en el boton
        $link_zoom = DB::table('info_data')
                                ->select('data')
                                ->where('value','LINK-ZOOM')
                                ->where('status','TO USE')    
                                ->get();                      

        $dd = $link_zoom[0]->data;
        return view('welcome',compact('dd'));
    }
}
