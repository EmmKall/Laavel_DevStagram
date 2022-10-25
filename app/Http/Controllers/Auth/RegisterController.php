<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('auth.register');
    }

    public function store( Request $request )
    {
        /* Validar que username sea unico, reescribiendo su valor */
        $request->request->add( [ 'username' => Str::slug( $request->username ) ] );

        /* dd( $request ); */
        $this->validate( $request, [
            'name'                => 'required|min:5',
            'username'              => ['required', 'unique:users', 'min:4', 'max:20'],
            'email'                 => 'required|unique:users|email|max:60',
            'password'              => ['required', 'confirmed', 'min:6']
        ]);

        //
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
        ]);
        /* Autenticar usuario */
        /* auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]); */
        auth()->attempt( $request->only( 'email', 'password') );

        //Redicreccionar al usuario
        return redirect()->route('post.index');
        
    }
}
