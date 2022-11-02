<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( User $user )
    {
        $posts = Post::where( 'user_id', $user->id )->paginate( 20 );
        /* $posts = $user->posts; */
        return view('dashboard', [
            'user'  => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store( Request $request )
    {
        $this->validate( $request, [
            'titulo' => [ 'required', 'max:255' ],
            'descripcion' => 'required',
            'imagen' => 'required',

        ]);

        //Forma de crear registro
        /* Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id,
        ]); */
        
        /* $post = new Post();
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id;
        $post->save(); */

        //Fofrma de guarda, teniendo la relacion en usuario de posts
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('post.index', auth()->user()->username );
    }

}
