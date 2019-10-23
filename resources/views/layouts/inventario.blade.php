@extends('layouts.layout')
@section('content')
<div class="container-fluid">
        <div class="row">

          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('inventory.index') }}">
                    <span data-feather="home"></span>
                    Inventario <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('items.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Items
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('places.index') }}">
                    <span data-feather="bar-chart-2"></span>
                    Lugares
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index') }}">
                      <span data-feather="users"></span>
                      Categorias
                    </a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('software_type.index') }}">
                    <span data-feather="layers"></span>
                    Tipo de Software
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('software.index') }}">
                    <span data-feather="layers"></span>
                    Software
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('trademark.index') }}">
                      <span data-feather="layers"></span>
                      Marca
                    </a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('model.index') }}">
                    <span data-feather="layers"></span>
                    Modelo
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
