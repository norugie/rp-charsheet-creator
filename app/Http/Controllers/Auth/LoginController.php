<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Character;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function login( Request $request )
    {
        $input = $request->all();

        $this->validate( $request, 
        [
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],
        [
            'username.exists' => 'Something is wrong with your username or password. Please check your input.',
            'username.required' => 'You cannot leave this section empty.',
            'password.required' => 'You cannot leave this section empty.'
        ]);
  
        if( auth()->attempt( array( 'username' => $input[ 'username' ], 'password' => $input[ 'password' ] ) ) )
        {
            if(! isset( $input[ 'char_id' ] ) || empty( $input[ 'char_id' ] ) )
                return redirect($this->redirectPath());
            else {
                 // Author characters here
                $character = Character::find( $input[ 'char_id' ] );

                $character->author_id = auth()->id();
                $character->published_at = date( 'Y-m-d H:i:s' );
                $character->save();

                return redirect( '/character/' . $character->slug );
            }
        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors(
                    [
                        'username'  => 'Something is wrong with your username or password. Please check your input.'
                    ]
                );
        }
    }
}
