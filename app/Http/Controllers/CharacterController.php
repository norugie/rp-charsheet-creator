<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;

class CharacterController extends Controller
{
    public function showCharacterInfo ($slug)
    {
        $charInfo = Character::where('slug', $slug)->firstOrFail();

        return view('character',
        [
            'character' => $charInfo
        ]);
    }

    public function createCharacter () {
        return view('create');
    }
}
