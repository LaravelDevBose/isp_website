<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class BaseController extends Controller
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


    public  $default_member = 'public\assets\images\professor.png';

    public function message($type='info', $message = 'Process Done..!'){
        Session::flash($type, $message);
    }
}
