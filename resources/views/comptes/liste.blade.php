@extends('layouts.app')

@section('contents')
    <h2>Liste des comptes</h2><br>
    <table class="table">
        <thead>
        <tr>
            <td>Id</td>
            <td>Numero de compte</td>
            <td>Type de compte</td>
            <td>Solde</td>
            <td>IdUtilisateur</td>
            <td>IdPack</td>
            <td>Etat</td>
            <td>Action</td>

        </tr>
        </thead>
        <tbody>
        @foreach($listeComptes as $comptes)
            <tr>
                <td>{{$comptes->id}}</td>
                <td>{{$comptes->numeroCompte}}</td>
                <td>{{$comptes->typeCompte}}</td>
                <td>{{$comptes->solde}}</td>
                <td>{{$comptes->utilisateur_id}}</td>
                <td>{{$comptes->pack_id}}</td>
                <td>{{$comptes->etat}}</td>

                <td>
                    <a href="{{ route('comptes.update', $comptes) }}" class="btn btn-outline-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('comptes.destroy', $comptes->id) }}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="offset-5">{{ $listeComptes->onEachSide(0)->links('pagination::bootstrap-4') }}</div>

@endsection
