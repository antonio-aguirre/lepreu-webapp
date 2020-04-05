<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoData;
use Session;
use Stancl\Tenancy\Tenant;

class ConfigController extends Controller
{
    public function configurations()
    {
        return view('welcome');
    }
}
