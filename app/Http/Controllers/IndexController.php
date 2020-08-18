<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class IndexController extends Controller
{
    public function uploadImage ( Request $request, $type )
    {
        $file = $request->file( 'file' );

        // Set path for image
        if ( $type === 'editor' ? $url = '/images/uploads' : $url = '/images/char_images' );
        $path = url( $url ) . '/' . $file->getClientOriginalName();
        $file_name_to_store = $path;

        // Upload image to designated image folder
        $file->move( public_path( $url ), $file->getClientOriginalName() );

        if ( $type === 'editor' ) return json_encode([ 'location' => $file_name_to_store ]);
    }

    public function deleteImage ( Request $request )
    {
        $filename = $request->filename;
        $path = public_path() . '/images/char_images/' . $filename;
        if( File::exists( $path ) ) File::delete( $path );
    }
}
