<!-- Sidebar -->
@auth
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       @if(auth()->user()->role_id == 1)
           href="{{route('dashboard')}}"
       @else
           href="{{route('index')}}"
       @endif
    >

        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cash CONNECT</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        @if(auth()->user()->role_id == 1)
            <a class="nav-link"
            href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
        @endif
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    @auth
        @if(auth()->user()->role_id == 1)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilisateurs"
                   aria-expanded="true" aria-controls="collapseUtilisateurs">
                    <i class="fas fa-user"></i>
                    <span>Utilisateurs</span>
                </a>
                <div id="collapseUtilisateurs" class="collapse" aria-labelledby="headingTwo"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Fonctionnalités:</h6>
                        <a class="collapse-item" href="{{ route('utilisateurs.list') }}">Lister</a>
                        <a class="collapse-item" href="{{ route('utilisateurs.create') }}">Creer</a>
                    </div>
                </div>
            </li>
        @endif

    @endauth

    @auth
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComptes"
               aria-expanded="true" aria-controls="collapseComptes">
                <i class="fas fa-university"></i>
                <span>Comptes bancaires</span>
            </a>
            <div id="collapseComptes" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Fonctionnalités:</h6>
                    <a class="collapse-item" href="{{ route('comptes.list') }}">Lister</a>

                    @if(auth()->user()->role_id != 1)
                        <a class="collapse-item" href="{{ route('comptes.create') }}">Ouvrir</a>
                    @endif

                </div>
            </div>
        </li>

    @endauth

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRIB"
           aria-expanded="true" aria-controls="collapseRIB">
            <i class="fas fa-pencil-alt"></i>
            <span>RIB</span>
        </a>
        <div id="collapseRIB" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fonctionnaités</h6>
                <a class="collapse-item" href="{{ route('ribs.list') }}">Lister</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCartes"
           aria-expanded="true" aria-controls="collapseCartes">
            <i class="fas fa-credit-card "></i>
            <span>Cartes</span>
        </a>
        <div id="collapseCartes" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fonctionnalités:</h6>
                <a class="collapse-item" href="{{ route('cartes.list') }}">Lister</a>
                @if(auth()->user()->role_id != 1)
                    <a class="collapse-item" href="{{ route('cartes.create') }}">Creer</a>
                @endif
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransactions"
           aria-expanded="true" aria-controls="collapseTransactions">
            <i class="fas fa-check-circle "></i>
            <span>Transactions</span>
        </a>
        <div id="collapseTransactions" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fonctionnalités:</h6>
                <a class="collapse-item" href="{{ route('transactions.list') }}">Lister</a>
                <a class="collapse-item" href="{{ route('transactions.create') }}">Faire une transaction</a>

            </div>
        </div>
    </li>

    @auth
        @if(auth()->user()->role_id == 1)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePacks"
                   aria-expanded="true" aria-controls="collapsePacks">
                    <i class="fas fa-check-circle "></i>
                    <span>Packs</span>
                </a>
                <div id="collapsePacks" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Fonctionnalités:</h6>
                        <a class="collapse-item" href="{{ route('packs.list') }}">Lister</a>
                        <a class="collapse-item" href="{{ route('packs.create') }}">Ajouter</a>
                    </div>
                </div>
            </li>
        @endif

    @endauth
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
@endauth
<!-- End of Sidebar -->
