@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col md:flex-row items-center">
            <div class="md:w-8/12 lg:w-6/12 p-3">
                <img src="{{ asset('img/user.png') }}" class="img-fluid" alt="imagen de perfil">
            </div>
            <div class="w-8/12 lg:w-6/12 flex flex-col items-center md:items-start md:justify-center py-10">
                <p class="text-gray-700 text-2xl mb-5">{{ $user->username }}</p>
                <p class="text-gray-700 text-sm mb-3 font-bold">
                    0 <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-700 text-sm mb-3 font-bold">
                    0 <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-700 text-sm mb-3 font-bold">
                    {{ $posts->count() }} <span class="font-normal">Post</span>
                </p>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        @if ( $posts->count() > 0)
            <div class="grid md:grid-cols-2 lg:grd-cols-3 xl:grid-cols-4 gap-6">
                @foreach ( $posts as $post )
                    <div class="col-12 col-md-4">
                        <a href="">
                            <img src="{{ asset( 'uploads' ) . '/' . $post->imagen }}" alt="Publicación {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>    
            <div class="my-10">
                {{ $posts->links( 'pagination::tailwind' ) }}
            </div>
        @else
            <p class="text-center text-gray-600 uppercase text-sm font-bold">Sin publicaciones aún</p>
        @endif
        
    </section>

@endsection