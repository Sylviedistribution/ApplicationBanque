@extends('layouts.app')

@section('contents')

    <div class="container">
        <h2 class="text-center">Update infos client</h2><br>

        <div class="card col-md-8 mx-auto">
            <div class="card-body">

                <form action="{{ route('utilisateurs.update', $utilisateur) }}" method="POST" class="user" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input name="nom" type="text"
                               class="form-control form-control-user @error('nom')is-invalid @enderror"
                               id="exampleInputFirstName" placeholder="Nom"
                               value="{{ old('nom', $utilisateur->nom) }}">

                        @error('nom')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input name="prenom" type="text"
                               class="form-control form-control-user @error('prenom')is-invalid @enderror"
                               id="exampleInputLastName" placeholder="Prenom"
                               value="{{ old('prenom', $utilisateur->prenom)}}">
                        @error('prenom')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input name="telephone" type="text"
                               class="form-control form-control-user @error('telephone')is-invalid @enderror"
                               id="exampleInputLastName" placeholder="Telephone"
                               value="{{ old('telephone', $utilisateur->telephone)}}" maxlength="9">
                        @error('telephone')
                        <span class=" invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input name="email" type="email"
                               class="form-control form-control-user @error('email')is-invalid @enderror"
                               id="exampleInputEmail" placeholder="Adresse mail"
                               value="{{ old('email', $utilisateur->email)}}">
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input name="dateNaissance" type="date"
                               class="form-control form-control-user @error('dateNaissance')is-invalid @enderror"
                               id="exampleInputDate" placeholder=""
                               value="{{ old('dateNaissance', $utilisateur->dateNaissance)}}">
                        @error('dateNaissance')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="password" type="password"
                                   class="form-control form-control-user @error('password')is-invalid @enderror"
                                   id="exampleInputPassword" placeholder="Mot de passe">
                            @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input name="password_confirmation" type="password"
                                   class="form-control form-control-user @error('password_confirmation')is-invalid @enderror"
                                   id="exampleRepeatPassword" placeholder="Confirmer le mot de passe">
                            @error('password_confirmation')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="exampleInputImage">Carte nationale d'identite (CNI)/ Passeport</label>
                            <input name="cni" type="file"
                                   class="form-control-file @error('cni') is-invalid @enderror" id="exampleInputImage">
                            @error('cni')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">Modifier</button>
                </form>
            </div>
        </div>
    </div>

@endsection
