<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-gradient-primary navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <h5 class="m-0 text-light">{{$page_title}}</h5>

    <!-- Right navbar links -->
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        @else

            <li class="nav-item mr-2">
                <a title="Retour" class="btn text-light" href="{{ url()->previous() }}" role="button"><i class="fas fa-arrow-left"></i></a>
            </li>
        @endguest
        <li class="nav-item">
            <a class="nav-link text-light" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
