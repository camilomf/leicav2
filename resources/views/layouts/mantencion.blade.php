@extends('layouts.layout')
@section('content')
<div class="container-fluid">
        <div class="row">

          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('maintenance') }}">
                        <span data-feather="shopping-cart"></span>
                        Mantención
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('maintenance_register.index') }}">
                    <span data-feather="home"></span>
                    Registro Mantención <span class="sr-only">(current)</span>
                  </a>
                </li>
                @if (auth()->user()->hasRoles(['User','Admin']))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('maintenance_plan.index') }}">
                      <span data-feather="shopping-cart"></span>
                      Plan de Mantención
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                        <span class="nav-label">Opciones plan de mantención</span>
                    </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('frequency.index') }}">Frecuencia</a></li>
                            <li><a href="{{ route('priority.index') }}">Prioridad</a></li>
                        </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('maintenance_type.index') }}">
                    <span data-feather="bar-chart-2"></span>
                    Tipo de Mantención
                  </a>
                </li>
                @endif
              </ul>
            </div>
          </nav>

          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('indice')
          </main>
        </div>
      </div>



@endsection
