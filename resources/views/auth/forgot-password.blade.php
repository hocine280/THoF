@extends('layout/app')

@section('fichierCSS')
    <link rel="stylesheet" href="{{asset('css/login-register.css')}}">
    <link rel="stylesheet" href="{{asset('css/alert-message.css')}}">
@endsection


@section('content')
    <!-- Mot de passe oublié ? -->
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
                        <h1 class="text-center mb-3 pb-3 fonts">Mot de passe oublié ? </h1>
                        
                        <div class="row">
                            <div class="col-md-3 col-lg-1"></div>
                            <div class="col-md-6 col-lg-10">
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show alert-success-alt mb-4 text-center" role="alert">
                                        <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-circle icon-close"></i> {{session('status')}}</button>
                                    </div>
                                @endif
                                <p style="text-align:justify;">Vous avez oublié votre mot de passe ? Aucun problème. Il suffit de nous communiquer votre adresse e-mail et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d'en choisir un nouveau.</p>

                                    <form class="text-center" method="POST" action="{{route('password.email')}}">
                                        @csrf
                                        <div class="form-group mb-2">
                                            <input type="email" name="email" id="email" class="form-control form-thof form-width @error('email') is-invalid @enderror" placeholder="Adresse e-mail"/>
                                        </div>
                                        @error('email')
                                        <p class="error-password">{{ $errors->first('email') }}</p>
                                        @enderror  
                                                                    
                                        <div class="pt-1 mb-4 text-center">
                                            <button class="btn  btn-lg button-login fonts" type="submit">Confirmer</button>
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
    <!-- Fin mot de passe oublié ? -->
    <!--Boucle de chargement-->
    <div id="preloader"></div>
@endsection

@section('fichierJS')
    <script src="{{ asset('js/login-register.js') }}"></script>
@endsection

