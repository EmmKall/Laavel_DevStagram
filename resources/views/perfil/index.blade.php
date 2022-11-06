@extends('layouts.app')

@section('titulo')
    Actualizar perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex mx-auto  md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route( 'perfil.store', auth()->user() ) }}" method="post" class="mt-10 md:mt-0" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username"  class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input id="username" name="username" type="text" placeholder="Tu username" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ auth()->user()->username }}" />
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen"  class="mb-2 block uppercase text-gray-500 font-bold">Imagen de perfil</label>
                    <input id="imagen" name="imagen" type="file" class="border p-3 w-full rounded-lg" value="" accept=".jpg, .jpeg, .png"/>
                </div>

                <div class="mb-5">
                    <input type="submit" value="Actualizar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold text-white w-full p-3 rounded-lg">
                </div>
            </form>
        </div>
    </div>
@endsection