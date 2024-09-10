<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel 8 User Roles and Permissions Tutorial') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Laravel 8 User Roles and Permissions - ItSolutionStuff.com
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                    <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                    <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                    <li><a class="nav-link" href="{{ route('permissions.index') }}">Manage Permission</a></li>
                    <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
<li class="nav-item">
    <a href="{{ route('materielTypes.index') }}"
       class="nav-link {{ Request::is('materielTypes*') ? 'active' : '' }}">
        <p>Materiel Types</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('materiels.index') }}"
       class="nav-link {{ Request::is('materiels*') ? 'active' : '' }}">
        <p>Materiels</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('typeSorties.index') }}"
       class="nav-link {{ Request::is('typeSorties*') ? 'active' : '' }}">
        <p>Type Sorties</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('fonctionEmployes.index') }}"
       class="nav-link {{ Request::is('fonctionEmployes*') ? 'active' : '' }}">
        <p>Fonction Employes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('employes.index') }}"
       class="nav-link {{ Request::is('employes*') ? 'active' : '' }}">
        <p>Employes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('sorties.index') }}"
       class="nav-link {{ Request::is('sorties*') ? 'active' : '' }}">
        <p>Sorties</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('retourMateriels.index') }}"
       class="nav-link {{ Request::is('retourMateriels*') ? 'active' : '' }}">
        <p>Retour Materiels</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('typeDepenses.index') }}"
       class="nav-link {{ Request::is('typeDepenses*') ? 'active' : '' }}">
        <p>Type Depenses</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('depenses.index') }}"
       class="nav-link {{ Request::is('depenses*') ? 'active' : '' }}">
        <p>Depenses</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('typeEntres.index') }}"
       class="nav-link {{ Request::is('typeEntres*') ? 'active' : '' }}">
        <p>Type Entres</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('entres.index') }}"
       class="nav-link {{ Request::is('entres*') ? 'active' : '' }}">
        <p>Entres</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('mouvementCaisses.index') }}"
       class="nav-link {{ Request::is('mouvementCaisses*') ? 'active' : '' }}">
        <p>Mouvement Caisses</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('invites.index') }}"
       class="nav-link {{ Request::is('invites*') ? 'active' : '' }}">
        <p>Invites</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('presences.index') }}"
       class="nav-link {{ Request::is('presences*') ? 'active' : '' }}">
        <p>Presences</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('typeDocuments.index') }}"
       class="nav-link {{ Request::is('typeDocuments*') ? 'active' : '' }}">
        <p>Type Documents</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('documents.index') }}"
       class="nav-link {{ Request::is('documents*') ? 'active' : '' }}">
        <p>Documents</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('employesMaterielsSorties.index') }}"
       class="nav-link {{ Request::is('employesMaterielsSorties*') ? 'active' : '' }}">
        <p>Employes Materiels Sorties</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('materielsSorties.index') }}"
       class="nav-link {{ Request::is('materielsSorties*') ? 'active' : '' }}">
        <p>Materiels Sorties</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('sorty2s.index') }}"
       class="nav-link {{ Request::is('sorty2s*') ? 'active' : '' }}">
        <p>Sorty2S</p>
    </a>
</li>


<<<<<<< HEAD
=======
<li class="nav-item">
    <a href="{{ route('depotMensuels.index') }}"
       class="nav-link {{ Request::is('depotMensuels*') ? 'active' : '' }}">
        <p>Depot Mensuels</p>
    </a>
</li>


>>>>>>> 086823d794266c97a05c6e63e4dfa4cf0b88f6b2
<li class="nav-item">
    <a href="{{ route('programmes.index') }}"
       class="nav-link {{ Request::is('programmes*') ? 'active' : '' }}">
        <p>Programmes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('emissions.index') }}"
       class="nav-link {{ Request::is('emissions*') ? 'active' : '' }}">
        <p>Emissions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('tournages.index') }}"
       class="nav-link {{ Request::is('tournages*') ? 'active' : '' }}">
        <p>Tournages</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('paymentEmployes.index') }}"
       class="nav-link {{ Request::is('paymentEmployes*') ? 'active' : '' }}">
        <p>Payment Employes</p>
    </a>
</li>


