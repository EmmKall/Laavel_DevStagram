<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store( Request $request)
    {
        /* $input = $request->all();
        return response()->json($input); */
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        $imagenServidor = Image::make( $imagen);
        $imagenServidor->fit(1000, 1000);
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save( $imagenPath );
        //Si marca error, posiblemente se tenga que crear la carpeta manual en public

        return response()->json( ['imagen' => $nombreImagen ] );
    }
}
