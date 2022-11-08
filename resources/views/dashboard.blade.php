@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col md:flex-row items-center">
            <div class="md:w-8/12 lg:w-6/12 p-3">
                <img src="{{ $user->imagen ? asset( 'perfiles' ) . '/' . $user->imagen : asset('img/user.png') }}" class="img-fluid" alt="imagen de perfil">
            </div>
            <div class="w-8/12 lg:w-6/12 flex flex-col items-center md:items-start md:justify-center py-10">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl mb-5">{{ $user->username }}</p>
                    @auth
                        @if( auth()->user()->id === $user->id )
                            <a href="{{ route( 'perfil.index', $user ) }}" class="text-gray-500 hover:text-gray-600 cursor-pointer pb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                  </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="text-gray-700 text-sm mb-3 font-bold">
                    {{ $user->followers->count() }} <span class="font-normal"> @choice( 'Seguidor|Seguidores', $user->followers->count() ) </span>
                </p>
                <p class="text-gray-700 text-sm mb-3 font-bold">
                    {{ $user->following->count() }} <span class="font-normal"> Siguiendo </span>
                </p>
                <p class="text-gray-700 text-sm mb-3 font-bold">
                    {{ $posts->count() }} <span class="font-normal">Post</span>
                </p>

                @auth
                    @if ( $user->id !== auth()->user()->id )
                        <div class="">
                            @if( !$user->siguiendo( auth()->user() ) )
                                <form action=" {{ route( 'users.follow', $user ) }}" method="POST">
                                    @csrf
                                    <input type="submit" value="Seguir" class="bg-blue-500 hover:to-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer text-center">
                                </form>
                            @else
                                <form action=" {{ route( 'users.unfollow', $user ) }}" method="POST">
                                    @csrf
                                    @method( 'DELETE' )
                                    <input type="submit" value="Dejar de seguir" class="bg-red-600 hover:bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer text-center">
                                </form>
                            @endif
                        </div>
                    @endif
                @endauth

            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        @if ( $posts->count() > 0)
            <div class="grid md:grid-cols-2 lg:grd-cols-3 xl:grid-cols-4 gap-6">
                @foreach ( $posts as $post )
                    <div class="col-12 col-md-4">
                        <a href="{{ route('post.show', [ $user->username, $post ] ) }}">
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