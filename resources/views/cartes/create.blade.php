@extends('layouts.app')

@section('contents')

    <div class="container">
        <h2 class="text-center">Generer une carte bancaire</h2><br>

        <div class="card col-md-8 mx-auto">
            <form action="{{ route('cartes.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <label>Solde:</label><br>
                    <input class="form-control @error('solde') is-invalid @enderror" type="text" name="solde">
                    @error('solde')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <label>Compte:</label><br>
                    <select class="form-control @error("compte_id") is-invalid @enderror" name="compte_id">
                        <option value=""></option>
                        @foreach($listeComptes as $comptes)
                            <option value="{{ $comptes->id }}">Numéro de compte:{{ $comptes->numeroCompte }}</option>
                        @endforeach
                    </select>
                    @error("compte_id")
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <button type="submit" class="btn btn-success">Generer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
