
<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url(auth()->user()->image) }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ auth()->user()->name  }}</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <small class="designation text-muted">{{ auth()->user()->userType->name  }}</small>
                <span class="status-indicator online"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item mt-2"> Alterar senha </a>
                <a class="dropdown-item"> Sair </a>
              </div>
            </div>
          </div>
        </div>
          <div class="progress"><div role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-info" style="width: 100%;"></div></div>
          <button class="btn btn-success btn-block"><i style="font-size: 13px !important" class="fa fa-plus mr-1"></i><span>Nova Consulta</span>
          </button>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('home')}}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Painel</span>
      </a>
    </li>

      <li class="nav-item">
          <a class="nav-link" href="{{route('consultas.index')}}">
              <i class="menu-icon fa fa-file-medical"></i>
              <span class="menu-title">Consultas</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="{{route('queixas.index')}}">
              <i class="menu-icon fa fa-diagnoses"></i>
              <span class="menu-title">Tipos de Queixa</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="{{route('pontos-de-conducao.index')}}">
              <i class="menu-icon fa fa-comment-medical"></i>
              <span class="menu-title">Pontos de Condução</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="{{route('unidades-de-saude.index')}}">
              <i class="menu-icon fa fa-hospital"></i>
              <span class="menu-title">Unidades de Saúde</span>
          </a>
      </li>



      <li class="nav-item">
          <a class="nav-link" href="{{route('usuarios.index')}}">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-title">Usuários</span>
          </a>
      </li>




    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#user-pages" aria-expanded="" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-lock-outline"></i>
        <span class="menu-title">Minha Conta</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="user-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/user-pages/login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/user-pages/register') }}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/user-pages/lock-screen') }}">Lock Screen</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="" target="_blank">
        <i class="menu-icon mdi mdi-file-outline"></i>
        <span class="menu-title">Documentação</span>
      </a>
    </li>
  </ul>
</nav>
