<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        return view( 'perfil.index', [

        ] );
    }

    public function store( Request $request )
    {
        $request->request->add( [ 'username' => Str::slug( $request->username ) ] );

        $this->validate( $request, [
            'username' => [ 'required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:editar-perfil,devstagram' ]
        ]);

        /* Obtener usuario */
        $user = User::find( auth()->user()->id );
        $user->username = $request->username;
        /* Actualizar imagen si existe */
        if( $request->imagen )
        {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make( $imagen);
            $imagenServidor->fit(1000, 1000);
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save( $imagenPath );

            $user->imagen = $nombreImagen;
        }

        /* Guardar registro */
        $user->save();
        /* Redireccionar */
        return redirect()->route( 'post.index', $user->username );

    }
}
