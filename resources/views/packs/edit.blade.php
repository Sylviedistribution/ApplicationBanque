@extends('layouts.app')

@section('contents')

    <div class="container">
        <h2 class="text-center">Mise a jour de pack</h2><br>

        <div class="card col-md-8 mx-auto">
            <form action="{{ route('packs.update', $pack) }}" method="post">
                @csrf
                <div class="card-body">
                    <label>Type:</label><br>
                    <input class="form-control @error('type') is-invalid @enderror" type="text" name="type"
                           value="{{ old('type', $pack->type)}}">
                    @error('type')
                    <span class=" invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <label>Agio:</label> <br>
                    <input type="text" name="agio" class="form-control @error('agio') is-invalid @enderror"
                           value="{{ old('agio', $pack->agio)}}">
                    @error('agio')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <label>Plafond:</label> <br>
                    <input type="text" name="plafond" class="form-control @error('plafond') is-invalid @enderror"
                           value="{{ old('plafond', $pack->plafond)}}">
                    @error('plafond')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <label>Etat:</label><br>
                    <select class="form-control @error("etat") is-invalid @enderror" name="etat">
                        <option value=""></option>
                        <option value="1">Actif</option>
                        <option value="0">Inactif</option>
                    </select>
                    @error('etat')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="btn btn-success mt-3 float-right">Modifier</button>
                </div>
            </form>
        </div>
    </div>

@endsection
