@extends('layout/template')
@section('tituloPagina', 'Empleados')

@section('slot')
    @if(sizeof($employees) == 0) 
    <div class="text-end">
        <h1>No hay empleados registrados.</h1>
        <a class="btn btn-primary" href="{{route('employee.create')}}">Crear empleado</a>
    </div>
    @else 
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Cargo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->lastname}}</td>
                        <td>{{$employee->role}}</td>
                        <td class="d-flex justify-content-end gap-2">
                            <a class="btn btn-primary p-2" href="{{ route('employee.update', $employee->id) }}" role="button">
                                Editar
                            </a>
                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <span class="fas fa-user-times"></span> Eliminar 
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        {{ $employees->links()}}
                    </td>
                    <td  class="text-end">
                        <a class="btn btn-primary" href="{{route('employee.create')}}">Crear empleado</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    @endif
@endsection 