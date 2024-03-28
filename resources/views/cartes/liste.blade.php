@extends('layouts.app')

@section('contents')
    <h2>Liste des cartes</h2><br>
    <table class="table ">
        <thead>
            <tr>
                <td>Id</td>
                <td>Numero de carte</td>
                <td>Date de creation</td>
                <td>Date d'expiration</td>
                <td>CVV</td>
                <td>Solde</td>
                <td>Actions</td>

            </tr>
        </thead>
        <tbody>
            @foreach($listeCartes as $cartes)
                <tr>
                    <td>{{$cartes->id}}</td>
                    <td>{{$cartes->numeroCarte}}</td>
                    <td>{{$cartes->dateCreation}}</td>
                    <td>{{$cartes->dateExpiration}}</td>
                    <td>{{$cartes->cvv}}</td>
                    <td>{{$cartes->solde}}</td>
                    <td>
                        <a href="{{ route('cartes.destroy', $cartes->id) }}" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>

    <div class="offset-5">{{ $listeCartes->onEachSide(0)->links('pagination::bootstrap-4') }}</div>

@endsection
