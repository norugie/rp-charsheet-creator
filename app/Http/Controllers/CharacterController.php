<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use App\Images;

class CharacterController extends Controller
{

    public function showCharacterList ()
    {
        $characters = Character::join( 'users', 'characters.author_id', '=', 'users.id' )->get();

        if(! $characters->count() ) return view( 'empty' );

        return view( 'index',
        [
            'characters' => $characters
        ]);
    }

    public function showCharacterListPerUser ( $username )
    {
        $characters = Character::join( 'users', 'characters.author_id', '=', 'users.id' )->where( 'users.username', $username )->get();

        if(! $characters->count() ) return view( 'empty' );

        return view( 'index',
        [
            'characters' => $characters
        ]);
    }

    public function showCharacterInfo ( $slug )
    {
        $character = Character::where( 'slug', $slug )->first();

        if (! $character ) return view( 'empty' );

        $author = Character::find($character->id)->author;
        $images = Character::find($character->id)->images;

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

    public function createCharacter () 
    {

    }
}
