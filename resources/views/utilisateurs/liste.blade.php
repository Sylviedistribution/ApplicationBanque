@extends('layouts.app')

@section('contents')
    <h2>Liste des utilisateurs</h2>
    <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary float-end">Créer un utilisateur</a>
    <br><br>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Date de naissance</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        @foreach($listeUtilisateurs as $utilisateur)
            <tr>
                <td>{{ $utilisateur->id }}</td>
                <td>{{ $utilisateur->nom }}</td>
                <td>{{ $utilisateur->prenom }}</td>
                <td>{{ $utilisateur->telephone }}</td>
                <td>{{ $utilisateur->email }}</td>
                <td>{{ $utilisateur->dateNaissance }}</td>
                <td>{{ $utilisateur->role_id }}</td>
                <td>
                    <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" class="btn btn-outline-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('utilisateurs.destroy', $utilisateur->id) }}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="offset-5">{{ $listeUtilisateurs->onEachSide(0)->links('pagination::bootstrap-4') }}</div>

@endsection
