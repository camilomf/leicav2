@extends('layouts.layout')

@section('content')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Lista de Usuarios</h3>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{ route('users.create') }}">Agregar nuevo usuario</a>
          </div>
        </div>

        @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{$message}}</p>
          </div>
        @endif

        <table class="table table-hover table-sm">
          <tr>
            <th width = "50px"><b>ID.</b></th>
            <th width = "300px">Nombre</th>
            <th width = "300px">Rol</th>
            <th>email</th>
            <th width = "265px">Accion</th>
          </tr>

          @foreach ($users as $user)
            <tr>
              <td><b>{{$user->id }}.</b></td>
              <td>{{$user->name}}</td>
              <td>{{$user->role->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                  <a class="btn btn-sm btn-warning" href="{{route('users.edit',$user->id)}}">Editar</a>
                  <a class="btn btn-sm btn-outline-info" href="{{route('users.editPassword',$user->id)}}">Cambiar contraseña</a>
                  @csrf
                  @method('DELETE')
                  @if ($user->id!=1 && auth()->user()->id != $user->id )
                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                  @endif 
                </form>
              </td>
            </tr>
          @endforeach
        </table>


      </div>

@endsection

