<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoData;
use Session;

class ConfigController extends Controller
{
    public function configurations()
    {
        return view('welcome');
    }
}
