@extends('layouts.app')

@section('titulo')
    Perfil: {{ $post->titulo }}
@endsection

@section('contenido')

    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset( 'uploads' ) . '/' . $post->imagen }}" alt="Publicación {{ $post->titulo }}">
            <div class="p-3">
                <div class="text-center flex justify-center align-items-center gap-4 p-1">
                    @auth
                        <livewire:like-post :post="$post" />
                    @endauth
                </div>
                <div class="text-center">
                    <p class="font-bold">{{ $post->user->username }}</p>
                    <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                    <p class="text-start">{{ $post->descripcion }}</p>
                </div>
            </div>
            @auth
            @if ( $post->user_id === auth()->user()->id )
            <form action="{{ route( 'post.destroy', $post ) }}" method="post" class="text-center">
                @method('DELETE')
                @csrf
                <input type="submit" value="Eliminar" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
            </form>
            @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-xl font-bold text-center mb-4">¿Qué opinas?</p>
                @if( session('mensaje') )
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <form action="{{ route('comentario.store', [ $user, $post ] ) }}" method="post">
                    @csrf
                    
                    <div class="mb-5 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
                        <label for="comentario"  class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                        <textarea id="comentario" name="comentario" placeholder="Comentario de publicación" class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror">{{ old('comentario') }}</textarea>
                        @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <input type="submit" value="Comentar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold text-white w-full p-3 rounded-lg">
                    </div>
                </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ( $post->comentarios->count() > 0 )
                        @foreach ( $post->comentarios as $comentario )
                            <div class="p-5 border-gray-300 border-b ">
                                <a class="text-indigo-500 font-bold" href="{{ route('post.index', $comentario->user ) }}">{{ $comentario->user->username }}</a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="text-sm text-gray-500 font-bold text-center">Sin comentarios aun</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection

