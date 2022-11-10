@extends('layouts.app')

@section('titulo')
    Inicio DevStagram
@endsection

@section('contenido')

    <x-listar-post :posts="$posts"/>
    
@endsection