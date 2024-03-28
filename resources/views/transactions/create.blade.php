@extends('layouts.app')

@section('contents')

    <div class="container">
        <h2 class="text-center">Faire une transaction</h2><br>

        <div class="card col-md-8 mx-auto">
            <form action="{{ route('transactions.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <label>Numero de compte du beneficiare:</label><br>
                    <input class="form-control @error('numeroCompteBeneficiaire') is-invalid @enderror" type="text"
                           name="numeroCompteBeneficiaire">
                    @error('numeroCompteBeneficiaire')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <label>Montant:</label><br>
                    <input class="form-control @error('montant') is-invalid @enderror" type="text" name="montant">
                    @error('montant')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <br><label>Choix du compte:</label><br>
                    <select class="form-control @error('compte_id') is-invalid @enderror" name="compte_id">
                        <option value=""></option>
                        @foreach($listeComptes as $comptes)
                            <option value="{{$comptes->id}}">N°:{{$comptes->numeroCompte}} Solde:{{$comptes->solde}}</option>
                        @endforeach
                    </select>
                    @error('typeCompte')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror


                    <button type="submit" class="btn btn-success mt-5">Envoyer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
