@extends('layouts.app')

@section('title', 'Mes comptes')

@section('contents')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="container mt-4">
            @foreach($listeComptes as $comptes)
                <div class="card mb-4">
                    <div class="card-header bg-gradient-dark pb-0">
                        <h6 class="text-white">Numero de compte: {{ $comptes->numeroCompte }}</h6>
                    </div>
                    <div class="card-body pt-4 p-3" style="color: black">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Type de compte: {{ $comptes->typeCompte }}</li>
                            <li class="list-group-item">Solde: {{ $comptes->solde }} FCFA</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-transparent d-flex justify-content-end">
                        <button class="btn btn-success me-2">Dépôt</button>
                        <button class="btn btn-danger">Retrait</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="offset-5">{{ $listeComptes->onEachSide(0)->links('pagination::bootstrap-4') }}</div>
    </main>
@endsection
