@extends('layouts.app')

@section('contents')
    <h2>Liste des packs</h2><br>
    <a href="{{route('packs.create')}} " class="btn btn-primary float-end">Creer</a>
    <table class="table ">
        <thead>
        <tr>
            <td>Id</td>
            <td>Type</td>
            <td>Agio</td>
            <td>Plafond</td>
            <td>Etat</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($listePacks as $packs)
            <tr>
                <td>{{$packs->id}}</td>
                <td>{{$packs->type}}</td>
                <td>{{$packs->agio}}</td>
                <td>{{$packs->plafond}}</td>
                <td>{{$packs->etat}}</td>
                <td>
                    <a href="{{ route('packs.edit', $packs->id) }}" class="btn btn-outline-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('packs.destroy', $packs->id) }}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
