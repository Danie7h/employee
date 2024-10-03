@extends('layout/template')
@section('tituloPagina', 'Empleados')

@section('slot')
    <form method="POST" action="{{ route('employee.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" gender >
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="lastname" name="lastname" gender >
        </div>
        <div>
            Genero
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender_f" value="f">
                <label class="form-check-label" for="gender_f">
                  Femenino
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender_m" value="m">
                <label class="form-check-label" for="gender_m">
                  Masculino
                </label>
              </div>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label" gender >Cargo</label>
            <input type="text" class="form-control" id="role" name="role">
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label" gender >Salario</label>
            <input type="number" class="form-control" id="salary" name="salary">
        </div>
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>              
        @endforeach
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Guardar</button>
        </div>    
    </form>
@endsection 