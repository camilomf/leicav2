@extends('layouts.layout')

@section('content')
<div class="container">
        <div class="row">
          <div class="col-md-10">
            <h3>Lista de Usuarios</h3>
          </div>
          <div class="col-sm-2">
            {{-- <a class="btn btn-sm btn-success" href="{{ route('user.create') }}">Agregar nuevo usuario</a> --}}
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
            <th width = "200px">Accion</th>
          </tr>

          @foreach ($users as $user)
            <tr>
              <td><b>{{$user->id }}.</b></td>
              <td>{{$user->name}}</td>
              <td>{{$user->role->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                {{-- <form action="{{ route('user.destroy', $user->id) }}" method="post">
                  <a class="btn btn-sm btn-success" href="{{route('user.show',$user->id)}}">Detalle</a>
                  <a class="btn btn-sm btn-warning" href="{{route('user.edit',$user->id)}}">Editar</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form> --}}
              </td>
            </tr>
          @endforeach
        </table>


      </div>

@endsection

