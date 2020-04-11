<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;

class CharacterController extends Controller
{

    public function showCharacterList ()
    {
        return view('index',
        [
            'characters' => Character::latest()->get()
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
