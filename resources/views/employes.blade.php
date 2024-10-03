@extends('layout/template')
@section('tituloPagina', 'Crud con Laravel 8')

@section('slot')
    @foreach ($data as $item)
        <div>{{ print_r($item) }}</div>
    @endforeach
@endsection 