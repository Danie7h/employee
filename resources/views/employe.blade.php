@extends('layout/template')
@section('tituloPagina', 'Crud con Laravel 8')

@section('slot')
    <form method="post" action="{{ route('roles.store') }}">
        @csrf
        <input type="text" name="role" value="" />
        <input type="number" name="salary" value="" />
        <button type="submit">
            enviar
        </button>
    </form>
@endsection 