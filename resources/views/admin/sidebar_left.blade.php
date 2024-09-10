<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-orange elevation-4">
    <div class="mb-3 py-3">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="{{ URL::asset("images/logo-bycode.png") }}" alt="AdminLTE Logo" class="brand-image"
                 style="opacity: .8; height: 100px; border-radius: 50%">
            BYFALL CODE
        </a>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
        @include('admin.menu')
    </div>
    <!-- /.sidebar -->
</aside>
