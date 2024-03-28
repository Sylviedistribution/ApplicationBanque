@extends('layouts.app')

@section('contents')
    <h2>Liste des RIBs</h2><br>
    <table class="table ">
        <thead>
        <tr>
            <td>Id</td>
            <td>Code banque</td>
            <td>Code guichet</td>
            <td>Numero de compte</td>
            <td>Cle RIB</td>
            <td>IBAN</td>
            <td>Id Utilisateur</td>
            <td>Id Compte</td>

        </tr>
        </thead>
        <tbody>
        @foreach($listeRibs as $ribs)
            <tr>
                <td>{{$ribs->id}}</td>
                <td>{{$ribs->codeBanque}}</td>
                <td>{{$ribs->codeGuichet}}</td>
                <td>{{$ribs->numeroCompte}}</td>
                <td>{{$ribs->cleRib}}</td>
                <td>{{$ribs->iban}}</td>
                <td>{{$ribs->utilisateur_id}}</td>
                <td>{{$ribs->compte_id}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="offset-5">{{ $listeRibs->onEachSide(0)->links('pagination::bootstrap-4') }}</div>

@endsection
