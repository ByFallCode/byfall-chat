<!-- Sidebar Menu -->
<nav class="m-2">
    <ul class="nav nav-pills nav-sidebar flex-column pb-2" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link bg-primary">
                <i class="fa fa-layer-group fa-2x"></i><br>
                <p>
                    Gestion des utilisateurs
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link ">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link ">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>Utilisateurs</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link bg-primary">
                <i class="fa fa-book fa-2x"></i><br>
                <p>
                    Gestion des documents
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{URL('typeDocuments')}}" class="nav-link ">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>Type de document</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL('documents')}}" class="nav-link ">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>Documents</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link bg-primary">
                <i class="fa fa-comment fa-2x"></i><br>
                <p>
                    Messagerie
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('chat.send') }}" class="nav-link ">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>Boite d'envoie</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chat.direct') }}" class="nav-link ">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>Boite de réception</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chat.index') }}" class="nav-link ">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>Messages de groupe</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
