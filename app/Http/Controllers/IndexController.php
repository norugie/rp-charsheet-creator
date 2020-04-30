<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;

class IndexController extends Controller
{
    public function login ()
    {
        return view( 'login' );
    }
}
