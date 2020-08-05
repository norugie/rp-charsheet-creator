<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Character;
use App\Images;

class CharacterController extends Controller
{

    public function showCharacterList ()
    {
        $characters = Character::join( 'users', 'characters.author_id', '=', 'users.id' )->whereNotNull( 'characters.published_at' )->get();

        if(! $characters->count() ) return view( 'empty' );

        return view( 'index',
        [
            'characters' => $characters
        ]);
    }

    public function showCharacterListPerUser ( String $username )
    {
        $characters = Character::join( 'users', 'characters.author_id', '=', 'users.id' )->where( 'users.username', $username )->get();

        if(! $characters->count() ) return view( 'empty' );

        return view( 'index',
        [
            'characters' => $characters
        ]);
    }

    public function showCharacterInfo ( String $slug )
    {
        $character = Character::where( 'slug', $slug )->first();

        if (! $character ) return view( 'empty' );

        $author = Character::find( $character->id )->author;
        $images = Character::find( $character->id )->images;

        return view( 'character',
        [
            'character' => $character,
            'author'    => $author,
            'images'    => $images
        ]);
    }

    public function searchCharacter ()
    {
        $query = request( 'search' );
        $characters = Character::join( 'users', 'characters.author_id', '=', 'users.id' )->where( 'characters.char_name', 'ILIKE', '%'.$query.'%' )->orWhere( 'users.name', 'ILIKE', '%'.$query.'%' )->get();

        if(! $characters->count() ) return view( 'empty' );

        return view( 'index',
        [
            'characters' => $characters
        ]);
    }

    public function createCharacterForm () 
    {
        return view( 'create' );
    }

    public function createCharacterGallery ( Int $id, String $filename )
    {
        $image = new Images();
        $image->char_filename = $filename;
        $image->char_id = $id;

        // Save current image object
        $image->save();
    }

    public function createCharacter () 
    {
        $character = new Character();

        $character->slug = rand( 1111, 9999 ) . '-' . strtolower( str_replace( ' ', '-', request( 'charname' ) ) );
        $character->char_name = request( 'charname' );
        $character->apparent_age = request( 'apparent_age' );
        if (! request( 'age' ) ? $character->age = request( 'apparent_age' ) : $character->age = request( 'age' ) );
        if (! request( 'gender_select' ) ? $character->gender = request( 'gender_custom' ) : $character->gender = request( 'gender_select' ) );
        if (! request( 'sexuality_select' ) ? $character->sexuality = request( 'sexuality_custom' ) : $character->sexuality = request( 'sexuality_select' ) );
        if (! request( 'chardesc' ) ? $character->chardesc = 'No character description given.' : $character->chardesc = request( 'chardesc' ));
        $character->author_id = 1;
        $images = request( 'image_name' );
        if (! $images ) {
            $character->cover_img = 'default.png';
            // Save current character object
            $character->save();
        } else {
            $image_array = explode( ',', rtrim( $images, ',' ) );
            $character->cover_img = $image_array[array_rand( $image_array )];
            
            // Save current character object
            $character->save();

            // Save character gallery
            foreach( $image_array as $image ):
                $this->createCharacterGallery( $character->id, $image );
            endforeach;
        }

        return redirect( '/character/' . $character->slug );
    }

    public function publishCharacter ( String $slug )
    {
        $character = Character::where( 'slug', $slug )->first();

        $character->published_at =  date('Y-m-d H:i:s');
        $character->save();

        return redirect( '/character/' . $slug );
    }
}
