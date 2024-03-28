@extends('layouts.app')

@section('contents')
    <h2>Liste des transactions</h2><br>
    <a href="{{route('$transactions.create')}} " class="btn btn-primary float-end">Creer</a>
    <table class="table ">
        <thead>
        <tr>
            <td>Id</td>
            <td>Emetteur</td>
            <td>Compte beneficiaire</td>
            <td>Date transaction</td>
            <td>Montant</td>
            <td>Id Compte</td>
        </tr>
        </thead>
        <tbody>
        @foreach($listeTransactions as $transactions)
            <tr>
                <td>{{$transactions->id}}</td>
                <td>{{$transactions->emetteur}}</td>
                <td>{{$transactions->beneficiaire}}</td>
                <td>{{$transactions->dateTransaction}}</td>
                <td>{{$transactions->montant}}</td>
                <td>{{$transactions->compte_id}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="offset-5">{{ $listeTransactions->onEachSide(0)->links('pagination::bootstrap-4') }}</div>

@endsection
