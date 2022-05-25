<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
        <h1><a href="{{route('index')}}"><span>THoF</span></a></h1>
        </div>
        <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="#accueil">Accueil</a></li>
            <li><a class="nav-link scrollto" href="#a-propos">A propos</a></li>
            @if(!Auth::check())
                <li class="dropdown"><a href="#"><span>Mon compte</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="icon-margin-right" href="{{route('login')}}"><i class="bi bi-box-arrow-in-right icon"></i>Se connecter</a></li>
                        <li><a class="icon-margin-right" href="{{route('register')}}"><i class="bi bi-person-plus-fill icon"></i>S'incrire</a></li>
                    </ul>
                </li>
            @else
                <li class="dropdown"><a href="#"><span> {{ Auth::user()->prenom }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="icon-margin-right" href="{{route('dashboard')}}"><i class="bi bi-kanban-fill icon"></i>Mon tableau de bord</a></li>
                        <li><a class="icon-margin-right" href="{{route('profile.show')}}"><i class="bi bi-person-circle icon"></i>Mon profil</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="icon-margin-right" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="bi bi-box-arrow-left icon"></i>{{ __('Se déconnecter') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>