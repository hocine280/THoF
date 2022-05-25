@extends('layout/app')

@section('fichierCSS')
    <link rel="stylesheet" href="{{asset('css/login-register.css')}}">
    <link rel="stylesheet" href="{{asset('css/alert-message.css')}}">
@endsection


@section('content')

    <!-- Réinitialisation du mot de passe -->
    <div class="vh-100" data-aos="zoom-in-down" data-aos-duration="1000">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10 ">
            <div class="card" >
              <div class="row g-0">
                <div class="col-md-12 col-lg-12 d-flex align-items-center ">
                    <div class="card-body p-5 text-black">
                        <div class="container text-center small mt-3 mb-3">
                            <a href="{{route('index')}}"><img src="img/logo-login.png" class="img-fluid" alt=""></a>
                        </div>
                        <h1 class="text-center mb-3 pb-3 fonts">Réinitialisation du mot de passe </h1>
                        
                        <div class="row">
                            <div class="col-md-3 col-lg-1"></div>
                            <div class="col-md-6 col-lg-10">
                               
                                <p style="text-align:justify;">Vous pouvez désormais définir votre nouveau mot de passe, par le biais des champs ci-dessous !</p>

                                    <form class="text-center" method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="form-group mb-2">
                                            <input type="email" name="email" id="email" class="form-control form-thof form-width @error('email') is-invalid @enderror" value="{{ old('email', $request->email) }}" required placeholder="Adresse e-mail"/>
                                        </div>
                                        @error('email')
                                        <p class="error-password">{{ $errors->first('email') }}</p>
                                        @enderror  

                                        <div class="form-group mb-2">
                                            <input type="password" name="password" id="password" class="form-control form-thof form-width @error('password') is-invalid @enderror" required placeholder="Nouveau mot de passe"/>
                                        </div>
                                        @error('password')
                                        <p class="error-password">{{ $errors->first('password') }}</p>
                                        @enderror  

                                        <div class="form-group mb-2">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-thof form-width @error('password_confirmation') is-invalid @enderror"  required placeholder="Confirmer votre mot de passe"/>
                                        </div>
                                        @error('password_confirmation')
                                        <p class="error-password">{{ $errors->first('password_confirmation') }}</p>
                                        @enderror  
                                                                    
                                        <div class="pt-1 mb-4 mt-4 text-center">
                                            <button class="btn  btn-lg button-login fonts" type="submit">Réinitialiser mon mot de passe</button>
                                        </div>
                                    </form>
                            </div>
                            <div class="col-md-3 col-lg-1"></div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin réinitialisation du mot de passe -->

    <!--Boucle de chargement-->
    <div id="preloader"></div>

@endsection


@section('fichierJS')
    <script src="{{ asset('js/login-register.js') }}"></script>
@endsection

