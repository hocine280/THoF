@extends('layout/app')

@section('fichierCSS')
    <link rel="stylesheet" href="{{asset('css/login-register.css')}}">
    <link rel="stylesheet" href="{{ asset('css/alert-message.css') }}">
@endsection


@section('content')

    <!--Formulaire de connexion-->
    <div class="vh-100" data-aos="zoom-in-down" data-aos-duration="1000">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10 ">
            <div class="card" >
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block img-container">
                  <img src="img/login.jpg" alt="login form" class="img-fluid animated img-presentation-login"/>
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-5 text-black">
                      <div class="container text-center small mt-3 mb-3">
                          <a href="{{route('index')}}"><img src="img/logo-login.png" class="img-fluid" alt=""></a>
                      </div>
                      <h1 class="text-center mb-3 pb-3 fonts">Se connecter</h1>

                      
  
                      <div class="row">
                        <div class="col-md-1 col-lg-1"></div>
                        <div class="col-md-10 col-lg-10">
                          @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show alert-success-alt mb-4 text-center" role="alert">
                              <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-circle icon-close"></i> {{ @session('success') }}</button>
                            </div>
                          @endif
                            <form class="text-center" method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="form-group mb-4">
                                    <input type="email" name="email" class="form-control form-thof form-width" placeholder="Adresse e-mail" value="{{ old('email') }}" />
                                </div>
                                <div class="form-group mb-4 password">
                                    <input type="password" name="password" id="password" class="form-control form-thof form-width" placeholder="Mot de passe"/>
                                    <a onclick="afficherPassword()"><i id="eyes" class="bi bi-eye-fill eyes"></i></a>
                                </div>
                                @error('email')
                                    <div class="error">
                                      <p><i class="bi bi-exclamation-circle-fill"></i> Les identifiants saisis sont incorrectes !</p>
                                    </div>
                                @enderror
                                <div class="pt-1 mb-4 text-center">
                                    <button class="btn  btn-lg button-login fonts" type="submit">Connexion</button>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-1 col-lg-1"></div>
                      </div>
                      <div class="pt-1 mb-4 text-center">
                          <a class="small fonts" href="{{ route('password.request') }}">Mot de passe oublié ? </a>
                          <p class="small mb-5 pb-lg-2 fonts">Vous n'avez pas encore de compte ? <a href="{{route('register')}}">Inscrivez-vous !</a></p>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin formulaire de connexion -->
    <!--Boucle de chargement-->
    <div id="preloader"></div>
@endsection

@section('fichierJS')
    <script src="{{ asset('js/login-register.js') }}"></script>
@endsection
