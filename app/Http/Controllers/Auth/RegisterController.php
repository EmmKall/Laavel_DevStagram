<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('auth.register');
    }

    public function store( Request $request )
    {
        /* dd( $request ); */
        $this->validate( $request, [
            'nombre'                => 'required|min:5',
            'username'              => ['required', 'unique:users', 'min:4', 'max:20'],
            'email'                 => 'required|unique:users|emailmax:60',
            'password'              => ['required'],
            'password_confirmation' => 'required',
        ]);
    }
}
