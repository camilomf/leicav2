@extends('layouts.layout')
@section('content')
<div class="container-fluid">
        <div class="row">
            
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('lendings') }}">
                    <span data-feather="home"></span>
                    Prestamos <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('lending_register.index') }}">
                    <span data-feather="file"></span>
                    Registro de Prestamos
                  </a>
                </li>
              </ul>
            </div>
          </nav>
      
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('indice')
          </main>
        </div>
      </div>



@endsection