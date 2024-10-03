@extends('layout/template')
@section('tituloPagina', 'Empleados')

@section('slot')
    <form method="POST" action="{{ route('employee.update', $employee->id) }}">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $employee->lastname }}">
        </div>
        <div>
            Genero
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender_f" value="f" {{ $employee->gender == 'f' ? 'checked' : '' }}>
                <label class="form-check-label" for="gender_f">
                  Femeinno
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender_m" value="m" {{ $employee->gender == 'm' ? 'checked' : '' }}>
                <label class="form-check-label" for="gender_m">
                  Masculino
                </label>
              </div>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="role" name="role"  value="{{ $role->role }}">
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salario</label>
            <input type="number" class="form-control" id="salary" name="salary"  value="{{ $role->salary }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Guardar</button>
            <a class="btn btn-primary" href="{{ route('history_salary.update', $employee->id) }}" role="button">Ver historial</a>
        </div>
    </form>
@endsection 