@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset( 'img/registrar.jpg') }}" alt="Registrarse en DevStagram" class="">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route( 'register' )}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="nombre"  class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input id="nombre" name="nombre" type="text" placeholder="Tu nombre" class="border p-3 w-full rounded-lg @error('nombre') border-red-500 @enderror" value="{{ old('nombre') }}" />
                    @error('nombre')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username"  class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}" />
                </div>
                <div class="mb-5">
                    <label for="email"  class="mb-2 block uppercase text-gray-500 font-bold">Correo eléctronico</label>
                    <input id="email" name="email" type="email" placeholder="Tu nombre corrreo eléctronico" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}" />
                </div>
                <div class="mb-5">
                    <label for="password"  class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Tu contraseña" class="border p-3 w-full rounded-lg" autocomplete="false" @error('password') border-red-500 @enderror"/>
                </div>
                <div class="mb-5">
                    <label for="password_confirmation"  class="mb-2 block uppercase text-gray-500 font-bold">Confirmar tu contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmar tu contraseña" class="border p-3 w-full rounded-lg" autocomplete="false" @error('password_confirm') border-red-500 @enderror"/>
                </div>
                <div class="mb-5">
                    <input type="submit" value="Registrar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold text-white w-full p-3 rounded-lg">
                </div>
            </form>
        </div>
    </div>
@endsection