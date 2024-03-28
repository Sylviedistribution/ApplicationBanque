<!-- Topbar -->
<container>
    <nav class="navbar navbar-expand navbar-dark bg-gradient-primary topbar mb-4 static-top shadow" >

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>


        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto" style="margin-right: 50px";>
            @if(auth()->check() && auth()->user()->role_id == 2 || !auth()->check())
            <li class="nav-item dropdown no-arrow"><a class="nav-link" href="#carousel" style="color: white;">Accueil</a></li>
            <li class="nav-item dropdown no-arrow"><a class="nav-link " href="#about"  style="color: white;">À Propos</a></li>
            <li class="nav-item dropdown no-arrow"><a class="nav-link " href="#packages"  style="color: white;">Nos Packages</a></li>
            <li class="nav-item dropdown no-arrow"><a class="nav-link " href="#account"  style="color: white;">Comptes</a></li>
            <li class="nav-item dropdown no-arrow"><a class="nav-link " href="#ephemeral-cards"  style="color: white;">Cartes</a></li>
            <!-- Nav Item - User Information -->
            @endif
            <li class="nav-item dropdown no-arrow">

                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @auth
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small mr-3"> {{ Auth::user()->prenom }}</span>
                    @else
                        Invité
                    @endauth
                    <img class="img-profile rounded-circle mr-3"
                         src="{{asset('img/img.png')}}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in ml-3"
                     aria-labelledby="userDropdown">
                    @auth
                        <a class="dropdown-item"  id="deconnexion" href="{{route('logout')}}">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400"></i>
                            Se deconnecter
                        </a>
                    @else
                        <a class="dropdown-item" href="{{route('login')}}">
                            <i class="fas fa-door-open fa-sm fa-fw text-gray-400"></i>
                            Se connecter
                        </a>
                        <div class="dropdown-divider "></div>
                        <a class="dropdown-item "  id="inscription" href="{{route('register')}}">
                            <i class="fas fa-sign-in fa-sm fa-fw mr-2 text-gray-400"></i>
                            S'inscrire
                        </a>
                    @endauth
                </div>
            </li>

        </ul>

    </nav>

</container>
<!-- End of Topbar -->
