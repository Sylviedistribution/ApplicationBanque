@extends('layouts.app')

@section('contents')

    <div class="container">
        <h2 class="text-center">Ouverture de compte</h2><br>

        <div class="card col-md-8 mx-auto">
            <form action="{{ route('comptes.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <label for="typeCompte">Type de compte:</label> <br>
                    <select class="form-control @error('typeCompte') is-invalid @enderror" name="typeCompte">
                        <option value=""></option>
                        <option value="Courant">Courant</option>
                        <option value="Epargne">Epargne</option>
                    </select>
                    @error('typeCompte')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <label for="pack_id">Pack:</label> <br>
                    <select class="form-control @error("pack_id") is-invalid @enderror" name="pack_id">
                        <option value=""></option>
                        @foreach($listePacks as $packs)
                            <option value="{{ $packs->id }}">{{ $packs->type }}</option>
                        @endforeach
                    </select>
                    @error("pack_id")
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <label for="solde">Solde de depart:</label> <br>
                    <input class="form-control @error("solde") is-invalid @enderror" type="text" name="solde">
                    @error("solde")
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-success">Creer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
