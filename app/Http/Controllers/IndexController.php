<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function login ()
    {
        return view( 'login' );
    }

    public function uploadImageTinyMCE ( Request $request )
    {
        $file = $request->file( 'file' );
        $path = url( '/images/uploads' ) . '/' . $file->getClientOriginalName();
        $file_name_to_store = $path;

        $file->move( public_path( '/images/uploads' ), $file->getClientOriginalName() );

        return json_encode([ 'location' => $file_name_to_store ]);
    }
}
