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
                    0 <span class="font-normal">Post</span>
                </p>
            </div>
        </div>
    </div>

@endsection