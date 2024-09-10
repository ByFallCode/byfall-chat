
<!-- Control Sidebar -->
<aside class="control-sidebar">
    <div class="card bg-light">
        <!-- User image -->
        <div class="card-header bg-primary text-center">
            <img src="/adminlte/img/user.png"
                 class="img-circle elevation-2"
                 alt="User Image" style="height: 100px; width: 100px;">
            <p>
                <h4>{{ Auth::user()->name }}</h4>
            </p>
        </div>
        <!-- Menu Footer-->
        <div class="card-footer">
            <a href="{{ route('users.show', [Auth::user()->id]) }}" class="btn btn-default btn-flat">Profile</a>
            <a href="#" class="btn btn-default btn-flat float-right"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Se déconnecter
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</aside>
<!-- /.control-sidebar -->

