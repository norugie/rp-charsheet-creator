<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get list of published characters by logged in user
        $characters = User::find( Auth::id() )->characters;

        // Redirect to 404 page if list is empty
        if(! $characters->count() ) return view( 'empty' );

        return view( 'user.dashboard',
        [
            'characters' => $characters
        ]);
    }

    public function account()
    {
        return view('user.account');
    }
}
