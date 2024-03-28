@extends('layouts.app')

@section('title', 'Transactions')

@section('contents')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="col-md-6 mt-4 offset-3">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Mes transactions</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group ">
                        @foreach($listeTransactions as $transactions)
                            @if($transactions->montant<0)
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg bg-gradient-dark">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-white text-sm ">{{$transactions->emetteur}}</h6>
                                            <span class="text-xs">{{$transactions->dateTransaction}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                        {{$transactions->montant}} FCFA
                                    </div>
                                </li>
                          @else
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg bg-gradient-dark">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_more</i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-white text-sm ">{{$transactions->emetteur}}</h6>
                                            <span class="text-xs">{{$transactions->dateTransaction}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                        {{$transactions->montant}} FCFA
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>

@endsection
