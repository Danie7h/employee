@extends('layout/template')
@section('tituloPagina', 'Empleados')

@section('slot')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cargo</th>
                <th scope="col" class="text-end">Salario</th>
                <th scope="col" class="text-end">Fecha de Ingreso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salaryIncrements as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastname }}</td>
                    <td>{{ $item->role }}</td>
                    <td class="text-end">${{ number_format($item->salary, 2) }}</td>
                    <td class="text-end">{{ $item->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection 