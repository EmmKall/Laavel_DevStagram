@extends('layouts.app')

@section('titulo')
    Inicio DevStagram
@endsection

@section('contenido')

    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @forelse ( $posts as $post )
        <div class="col-12 col-md-4">
            <a href="{{ route('post.show', [ $post->user->username, $post ] ) }}">
                <img src="{{ asset( 'uploads' ) . '/' . $post->imagen }}" alt="Publicación {{ $post->titulo }}">
            </a>
        </div>
    @empty
        <p class="text-center">Sin posts aun, sigue a alguien para poder ver sus posts</p>
    @endforelse
    </div>
    
@endsection