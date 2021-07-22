<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CharacterController;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'name.required' => 'You cannot leave this section empty.',
            'username.required' => 'You cannot leave this section empty.',
            'email.required' => 'You cannot leave this section empty.',
            'password.required' => 'You cannot leave this section empty.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        // if( $request->input('char_id') == null || empty( $request->input('char_id') ) )
        //     // return $this->registered($request, $user) ?: redirect($this->redirectPath());
        //     echo "beh";
        // else {
        //     // Author characters here
        //     $character = Character::find($request->input('char_id'));

        //     $character->author_id = $user->id;
        //     $character->published_at = date( 'Y-m-d H:i:s' );
        //     $character->save();

        //     // return redirect( '/character/' . $character->slug );
        // }

        if( $request->input('char_slug') == null || empty( $request->input('char_slug') ) )
            return $this->registered($request, $user) ?: redirect($this->redirectPath());
        else {
            // Publish character here
            $character = new CharacterController();
            $character->publishCharacter( $request->input('char_slug') );

            return redirect( '/character/' . $request->input('char_slug') );
        }
    }
}
