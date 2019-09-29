<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <script src="{{ asset('/js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="app">
            <header>
                <nav class="navbar bg-white shadow-sm" >
                        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
                        <ul class="nav nav-pills">
                            <li class="nav-item "><a class="nav-link {{ setActive('home') }}  " href="{{ route('home') }}">Home</a></li>
                            @if (auth()->user()->hasRoles(['User','Admin']))
                                <li class="nav-item "><a class="nav-link {{ setActive('maintenance.index') }} " href="{{ route('maintenance.index') }}">Mantencion</a></li>
                            @endif


                            <li class="nav-item "><a class="nav-link {{ setActive('inventory') }} " href="{{ route('inventory') }}">Inventario</a></li>
                            <li class="nav-item "><a class="nav-link {{ setActive('lendings') }} " href="{{ route('lendings') }}">Prestamos</a></li>
                            @if (auth()->user()->hasRoles(['Chief']))
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
            <div class="container-f">
                 <span class="text-muted">{{ config('app.name') }} | Copyright @ {{ date('Y') }}</span>
            </div>
        </footer>


    </body>
</html>
