@extends('layouts.app')

@section('title', 'Liste des cartes')

@section('contents')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-dark">Mes cartes</div>
                @foreach($listeCartes as $cartes)
                    <div class="card-body">
                        <div class="float-left text-dark">
                            <p style="font-size: 40px; font-family: 'Times New Roman'">Solde:{{$cartes->solde }}</p>
                        </div>
                        <div class="card-container">
                            <div class="card-wrapper">
                                <div class="card">
                                    <div class="card-front">
                                        <div class="card-logo">
                                            <!-- Logo de la banque -->
                                            <img src="{{ asset("img/logo.png") }}" alt="Logo de la banque"/>
                                        </div>
                                        <div class="card-number">
                                            <!-- Numéro de la carte -->
                                            <!-- Numéro de la carte -->
                                            {{ substr($cartes->numeroCarte, 0, 4) }}
                                            {{ substr($cartes->numeroCarte, 4, 4) }}
                                            {{ substr($cartes->numeroCarte, 8, 4) }}
                                            {{ substr($cartes->numeroCarte, 12, 4) }}
                                        </div>
                                        <br>
                                        <p class="card-name">
                                            <!-- Nom du titulaire de la carte -->
                                            {{ $user->nom }} {{$user->prenom}}
                                        </p>
                                        <p class="card-expire">
                                            <!-- Date d'expiration de la carte -->
                                            {{ date('Y-m', strtotime($cartes->dateExpiration)) }}
                                        </p>
                                        <div class="arrow"></div>
                                    </div>
                                    <div class="card-back">
                                        <div class="card-cvv">
                                            <!-- Code de vérification -->
                                            <div class="cvv-label">CVV <span
                                                        class="cvv-number">{{ $cartes->cvv }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <a class="btn btn-danger" onclick="confirmDelete('{{ route('cartes.destroy', $cartes->id) }}')">Detruire</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="offset-5">{{ $listeCartes->onEachSide(0)->links('pagination::bootstrap-4') }}</div>
    <script>
        function confirmDelete(route) {
            // Afficher une boîte de dialogue de confirmation
            if (confirm("Êtes-vous sûr(e) de vouloir détruire cette carte ?")) {
                // Rediriger vers la route de suppression si l'utilisateur clique sur OK
                window.location.href = route;
            } else {
                // Ne rien faire si l'utilisateur clique sur Annuler
                return false;
            }
        }
    </script>

@endsection
