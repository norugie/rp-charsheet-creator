<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function login ()
    {
        return view( 'login' );
    }

    public function uploadImage ( Request $request, $type )
    {
        $file = $request->file( 'file' );
        if ( $type === 'editor' ? $url = '/images/uploads' : $url = '/images/char_images' );
        $path = url( $url ) . '/' . $file->getClientOriginalName();
        $file_name_to_store = $path;

        $file->move( public_path( $url ), $file->getClientOriginalName() );

        if ( $type === 'editor' ) return json_encode([ 'location' => $file_name_to_store ]);
    }
}
