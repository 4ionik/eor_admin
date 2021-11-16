<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item " style="padding-left:15px;">
                    <a class="btn btn-sm btn-primary" href="{{ route('home') }}">
                        <i class="ni ni-shop"></i>
                        <span>Proyectos</span>
                    </a>
                </li>
                <li class="nav-item " style="padding-left:15px;">
                    <a class="btn btn-sm btn-primary" href="{{ route('post.index') }}">
                        <i class="ni ni-chart-bar-32"></i>
                        <span>Vistas</span>
                    </a>
                </li>
                <li class="nav-item " style="padding-left:15px;">
                    <a class="btn btn-sm btn-primary" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
