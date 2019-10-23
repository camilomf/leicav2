<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
        {{-- <link rel="stylesheet" href=""> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('/data_table/datatables.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/data_table/DataTables-1.10.20/css/dataTables.bootstrap4.min.css') }}">
        {{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
        {{-- <script src="{{ asset('/js/jquery-3.3.1.slim.min.js') }}"></script> --}}
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>
    <body>
        <div id="app">
            <header>
                {{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
                <nav class="navbar bg-white shadow-sm" >
                        <img src="{{ asset('/img/leica.png') }}" width="50px" height="50px">
                        <ul class="nav nav-pills">
                            <li class="nav-item "><a class="nav-link {{ setActive('home') }}  " href="{{ route('home') }}">Home</a></li>
                            <li class="nav-item "><a class="nav-link {{ setActive('maintenance') }} " href="{{ route('maintenance') }}">Mantencion</a></li>
                            <li class="nav-item "><a class="nav-link {{ setActive('inventory.index') }} " href="{{ route('inventory.index') }}">Inventario</a></li>
                            <li class="nav-item "><a class="nav-link {{ setActive('lendings') }} " href="{{ route('lendings') }}">Prestamos</a></li>
                            @if (auth()->user()->hasRoles(['Chief','Admin']))
                             <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plan de Estudio</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown06">
                                      <a class="dropdown-item" href="{{ route('plan.index') }}">Plan de estudio</a>

                                      <a class="dropdown-item" href="{{ route('career.index') }}">Carrera</a>

                                    </div>
                            </li>
                            @endif


                            {{-- <li class="nav-item "><a class="nav-link {{ setActive('study_plan_manage') }} " href="{{ route('study_plan_manage') }}">Plan de estudios</a></li> --}}
                            @if (auth()->user()->hasRoles(['Admin']))
                                <li class="nav-item "><a class="nav-link {{ setActive('users.index') }} " href="{{ route('users.index') }}">Usuarios</a></li>
                            @endif

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->email }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown07">
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Salir</a>
                                </div>
                            </li>
{{--
                            <li class="nav-item"><a class="nav-link" href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Cerrar Sesión</a></li> --}}
                        </ul>
                    </nav>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                    </form>
            </header>
            <br>
            <main>
                    @yield('content')
            </main>
        </div>

        <footer class="footer-f">
            {{-- <div class="container-f">
                 <span class="text-muted">{{ config('app.name') }} | Copyright @ {{ date('Y') }}</span>
            </div> --}}
        </footer>


    </body>
</html>
