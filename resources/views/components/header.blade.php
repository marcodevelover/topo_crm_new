<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      <a class="navbar-brand brand-logo" href="{{ url('/') }}">
          <img src="{{ url('assets/images/Toposervis-Logo.png') }}" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
            <img src="{{ url('assets/images/Toposervis-Logo.png') }}" alt="logo" />
      </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        {{-- <ul class="navbar-nav navbar-nav-left header-links">
            <li class="nav-item active d-none d-lg-flex">
                <a href="{{ route('certificaciones.create') }}" class="nav-link">
                    <span class="font-weight-bold">Nuevo Registro</span> <i class="mdi mdi-plus"></i>
                </a>
            </li>
        </ul> --}}
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                  aria-expanded="false">
                    <span class="profile-text d-none d-md-inline-flex font-weight-bold">
                        {{ auth::user()->name }}
                    </span>
                    <div style="display:inline-block;">
                        <div class="img-xs rounded-circle" style="background: #0d5682;display: flex;justify-content: center;align-items: center;font-weight: bold;font-size: 16px;">{{ auth::user()->name[0] }}</div>
                    </div>
                    {{-- <img class="img-xs rounded-circle" src="{{ url('assets/images/faces/face8.jpg') }}"
                      alt="Profile image">  --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <a href="{{ route('usuarios.edit', auth::user()->id ) }}" class="dropdown-item py-2"> Mi perfil </a>
                    <form action="{{ route('logout') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="dropdown-item py-2">Cerrar sesión</button>
                    </form>
              </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="mdi mdi-menu icon-menu"></span>
        </button>
    </div>
</nav>

