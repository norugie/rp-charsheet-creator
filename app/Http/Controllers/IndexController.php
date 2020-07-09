<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function login ()
    {
        return view( 'login' );
    }

    public function uploadImageDropzoneJS ( Request $request )
    {
        $file = $request->file( 'file' );
        $url = '/images/char_images';
        $path = url( $url ) . '/' . $file->getClientOriginalName();
        $file_name_to_store = $path;

        $file->move( public_path( $url ), $file->getClientOriginalName() );
    }

    public function uploadImageTinyMCE ( Request $request )
    {
        $file = $request->file( 'file' );
        $url = '/images/uploads';
        $path = url( $url ) . '/' . $file->getClientOriginalName();
        $file_name_to_store = $path;

        $file->move( public_path( $url ), $file->getClientOriginalName() );

        return json_encode([ 'location' => $file_name_to_store ]);
    }
}
