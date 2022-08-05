<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav pt-4">
        <li class="nav-item {{ active_class('/') }}">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ active_class('certificaciones') }}">
            <a class="nav-link" href="{{ route('certificaciones.index')}}">
                <i class="menu-icon mdi mdi-file-document-box"></i>
                <span class="menu-title">Certificados</span>
            </a>
        </li>
        <li class="nav-item {{ active_class('verificados') }}">
            <a class="nav-link" href="{{ route('verificados.index')}}">
                <i class="menu-icon mdi mdi-microscope"></i>
                <span class="menu-title">Verificados</span>
            </a>
        </li>
        @if( Auth::user()->rol == 'admin' )
        <li class="nav-item {{ active_class('patrones') }}">
            <a class="nav-link" href="{{ route('patrones.index')}}">
                <i class="menu-icon mdi mdi-folder-multiple"></i>
                <span class="menu-title">Patrones de ref.</span>
            </a>
        </li>
        @endif
        <li class="nav-item {{ active_class('usuarios') }}">
            <a class="nav-link" href="{{ route('usuarios.index') }}">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="https://www.bootstrapdash.com/demo/star-laravel-free/documentation/documentation.html"
                target="_blank">
                <i class="menu-icon mdi mdi-file-outline"></i>
                <span class="menu-title">Configuraciones</span>
            </a>
        </li> --}}
    </ul>
</nav>