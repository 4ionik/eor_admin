<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}" data-toggle="tooltip" data-original-title="{{ setting('company_name') }}">
                {{ substr(setting('company_name'), 0, 15) }}
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is(['home*', 'post*'])) ? 'active' : '' }}" href="{{route('home')}}">
                            <i class="ni ni-shop text-primary_brown"></i>
                            <span class="nav-link-text">Explorador</span>
                        </a>
                    </li>
                    @can('update-settings')
                    <li class="nav-item">
                        <hr class="my-3">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('settings*')) ? 'active' : '' }}" href="{{route('settings.index')}}">
                            <i class="ni ni-settings-gear-65 text-primary_brown"></i>
                            <span class="nav-link-text">Configuraciones</span>
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <hr class="my-3">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('novedades*')) ? 'active' : '' }}" href="{{route('novedades')}}">
                            <i class="fa fa-plus"></i>
                            <span class="nav-link-text">Novedades</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('about*')) ? 'active' : '' }}" href="{{route('about')}}">
                            <i class="ni ni-collection text-primary_brown"></i>
                            <span class="nav-link-text">Quiénes Somos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('politica*')) ? 'active' : '' }}" href="{{route('politica-privacidad')}}">
                            <i class="ni ni-collection text-primary_brown"></i>
                            <span class="nav-link-text">Condiciones de Uso</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ (request()->is('datos*')) ? 'active' : '' }}" href="{{route('politica-datos')}}">
                            <i class="fa fa-info"></i>
                            <span class="nav-link-text">Uso de Datos</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('version*')) ? 'active' : '' }}" href="{{route('version')}}">
                            <i class="ni ni-app"></i>
                            <span class="nav-link-text"> Versión de la Aplicación</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
