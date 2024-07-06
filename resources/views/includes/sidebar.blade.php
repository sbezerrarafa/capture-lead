

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-superior">
                <div class="sidebar-header">
                    <h3>Leads Capture</h3>
                    <strong>LS</strong>
                </div>
                <ul class="list-unstyled components">
                    <li class="active">
                        {{-- <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" >
                            <i class="fas fa-home"></i>
                            Home
                        </a> --}}
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                        {{-- <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="#">Lista</a>
                            </li>
                            <li>
                                <a href="#">Home 2</a>
                            </li>
                            <li>
                                <a href="#">Home 3</a>
                            </li>
                        </ul> --}}
                    </li>
                    <li class="nav-item dropdown">
                        <a id="leadsDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-list"></i>
                            <span>Leads</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="leadsDropdown">
                            <a class="dropdown-item" href="{{ route('search.places') }}">Buscar Leads</a>
                            <a class="dropdown-item" href="{{ route('leads.index') }}">Lista de Leads</a>
                        </div>
                    </li>
                    
                    <li>
                        <a href="{{ route('campanhas.index') }}">
                            <i class="fa-solid fa-bullhorn"></i>
                          <span>Campanhas</span> 
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('leads') }}">
                            <i class="fa-solid fa-users"></i>
                           Clientes
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('suporte')}}">
                            <i class="fa-solid fa-clipboard-question"></i>
                            <span>FAQ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('resultados')}}">
                            <i class="fa-solid fa-ranking-star"></i> 
                            <span>Resultados</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('configuracoes')}}">
                            <i class="fa-solid fa-gears"></i>
                            <span>Configurações</span>
                        </a>
                    </li>
                </ul>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle logout-user" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('perfil.edit') }}">Editar Perfil</a>
                            
                            @if(Auth::user()->isAdmin())
                                <a class="dropdown-item" href="{{ route('admin.manage-users') }}">Gerenciar Usuários</a>
                            @endif
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Sair</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('campanhas.index') }}">Campanhas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('suporte') }}">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('resultados') }}">Resultados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('configuracoes') }}">Configurações</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

