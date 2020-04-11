<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;

class CharacterController extends Controller
{

    public function showCharacterList ()
    {
        $characters = Character::join('images', 'images.char_id', '=', 'characters.id')->groupBy('characters.id')->get();

        return view('index',
        [
            'characters' => $characters
        ]);
    }

    public function showCharacterInfo ($slug)
    {
        return view('character',
        [
            'character' => Character::where('slug', $slug)->firstOrFail()
        ]);
    }

    public function createCharacter () {
        return view('create');
    }
}
