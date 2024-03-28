<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Register</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    <img width="120%" height="100%" src="{{asset('img/register_image.jpg')}}">

                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Creer un compte!</h1>
                        </div>
                        <form action="{{ route('register.save') }}" method="POST" class="user" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="nom" type="text"
                                       class="form-control form-control-user @error('nom')is-invalid @enderror"
                                       id="exampleInputFirstName" placeholder="Nom">
                                @error('nom')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input name="prenom" type="text"
                                       class="form-control form-control-user @error('prenom')is-invalid @enderror"
                                       id="exampleInputLastName" placeholder="Prenom">
                                @error('prenom')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input name="telephone" type="text"
                                       class="form-control form-control-user @error('telephone')is-invalid @enderror"
                                       id="exampleInputLastName" placeholder="Telephone" maxlength="9">
                                @error('telephone')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input name="email" type="email"
                                       class="form-control form-control-user @error('email')is-invalid @enderror"
                                       id="exampleInputEmail" placeholder="Adresse mail">
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input name="dateNaissance" type="date"
                                       class="form-control form-control-user @error('dateNaissance')is-invalid @enderror"
                                       id="exampleInputDate" placeholder="">
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
                            </div>
                            <div class="form-group">
                                <label for="exampleInputImage">Carte nationale d'identite (CNI)/ Passeport</label>
                                <input name="cni" type="file"
                                       class="form-control-file @error('cni') is-invalid @enderror"
                                       id="exampleInputImage">
                                @error('cni')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">S'enregistrer</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Déjà un compte? Se connecter!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
