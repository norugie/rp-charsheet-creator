<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Character;
use App\Images;
use Auth;

class CharacterController extends Controller
{

    public function showCharacterList ()
    {
        // Get list of published characters
        $characters = Character::join( 'users', 'characters.author_id', '=', 'users.id' )->whereNotNull( 'characters.published_at' )->get();

        // Redirect to 404 page if list is empty
        if(! $characters->count() ) return view( 'empty' );

        return view( 'index',
        [
            'characters' => $characters
        ]);
    }

    public function showCharacterListPerUser ( String $username )
    {
        // Get list of published characters per user
        $characters = Character::join( 'users', 'characters.author_id', '=', 'users.id' )->where( 'users.username', $username )->whereNotNull( 'characters.published_at' )->get();

        // Redirect to 404 page if list is empty
        if(! $characters->count() ) return view( 'empty' );

        return view( 'index',
        [
            'characters' => $characters
        ]);
    }

    public function showCharacterInfo ( String $slug )
    {
        // Get character info
        $character = Character::where( 'slug', $slug )->first();

        // Redirect to 404 page if list is empty
        if (! $character ) return view( 'empty' );

        // Get character's author info
        $author = Character::find( $character->id )->author;
        // Get character's images
        $images = Character::find( $character->id )->images;
        // Get author's other works
        $works  = User::find( $author->id )->characters()->whereNotNull( 'published_at' )->inRandomOrder()->limit( 3 )->get();

        return view( 'character',
        [
            'character' => $character,
            'author'    => $author,
            'images'    => $images,
            'works'     => $works
        ]);
    }

    public function searchCharacter ()
    {
        $query = request( 'search' );

        // Get character list for search results
        $characters = Character::join( 'users', 'characters.author_id', '=', 'users.id' )->where( 'characters.char_name', 'ILIKE', '%'.$query.'%' )->orWhere( 'users.name', 'ILIKE', '%'.$query.'%' )->whereNotNull( 'characters.published_at' )->get();

        // Redirect to 404 page if list is empty
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

    public function createCharacter ( Request $request ) 
    {
        $character = new Character();

        request()->validate( 
        [
            'charname' => 'required',
            'apparent_age' => 'required|integer',
        ],
        [
            'charname.required' => 'You cannot leave this section empty.',
            'apparent_age.required' => 'You cannot leave this section empty.',
            'apparent_age.integer' => 'You must enter a numerical value here.'
        ]);

        $character->slug = rand( 1111, 9999 ) . '-' . strtolower( str_replace( ' ', '-', request( 'charname' ) ) );
        $character->char_name = request( 'charname' );
        $character->apparent_age = request( 'apparent_age' );
        if (! request( 'age' ) ? $character->age = request( 'apparent_age' ) : $character->age = request( 'age' ) );
        if (! request( 'gender_select' ) ? $character->gender = request( 'gender_custom' ) : $character->gender = request( 'gender_select' ) );
        if (! request( 'sexuality_select' ) ? $character->sexuality = request( 'sexuality_custom' ) : $character->sexuality = request( 'sexuality_select' ) );
        if (! request( 'chardesc' ) ? $character->chardesc = 'No character description given.' : $character->chardesc = request( 'chardesc' ));
        $character->info = request( 'info' );
        if(! Auth::id() ? $character->author_id = 1 : $character->author_id = Auth::id() );
        $images = request( 'image_name' );
        if (! $images ) {
            $character->cover_img = 'default.png';
            
            // Save current character object
            $character->save();
        } else {
            $image_array = explode( ',', rtrim( $images, ',' ) );
            // Pick random image from image array to set as cover image
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
        // Get unpublished character
        $character = Character::where( 'slug', $slug )->first();

        // If $id is not NULL, use auth id as author value
        if( Auth::id() ) $character->author_id = Auth::id();

        // Update published date
        $character->published_at =  date('Y-m-d H:i:s');
        
        // Save current character object
        $character->save();

        return redirect( '/character/' . $slug );
    }

    public function updateCharacterForm ( String $slug ) 
    {
        // Get character
        $character = Character::where( 'slug', $slug )->first();

        // Redirect to Dashboard if character to update is not owned by currently logged in author else redirect to update page
        if(Auth::id() !== $character->author_id) return redirect( '/dashboard' );
        else  return view( 'update', 
        [
            'character' => $character
        ]);
    }
}
