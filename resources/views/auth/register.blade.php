@extends('layout/app')

@section('fichierCSS')
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
@endsection

@section('content')
    
    <!-- Formulaire d'inscription -->
    <div class="vh-100" data-aos="zoom-in-down" data-aos-duration="1000">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10 ">
            <div class="card">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block img-container">
                  <img src="img/login.jpg" alt="login form" class="img-fluid animated img-presentation-login"/>
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body text-black">
                      <div class="container text-center small mt-3 mb-3">
                          <a href="{{route('index')}}"><img src="img/logo-login.png" class="img-fluid" alt=""></a>
                      </div>
                      <h1 class="text-center mb-3 pb-3 fonts">S'inscrire</h1>

                      @if(session('danger'))
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissible fade show alert-success-alt" role="alert">
                                        <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-circle icon-close"></i> {{session('danger')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @endif

                      <div class="row">
                          <div class="col-md-1 col-lg-1"></div>
                          <div class="col-md-10 col-lg-10">
                              <form class="text-center" action="{{route('register')}}" method="POST">
                                @csrf
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group mb-4">
                                              <input type="text" name="nom" class="form-control form-thof form-width @error('nom') is-invalid ombre-disable @enderror" placeholder="Nom" value="{{ old('nom') }}"/>
                                              @error('nom')
                                                <div class="invalid-feedback">
                                                    <span>{{$errors->first('nom')}}</span>
                                                </div>
                                              @enderror

                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group mb-4">
                                              <input type="text" name="prenom" class="form-control form-thof form-width @error('prenom') is-invalid ombre-disable @enderror" placeholder="Prenom" value="{{ old('prenom') }}"/>
                                              @error('prenom')
                                                <div class="invalid-feedback">
                                                    <span>{{$errors->first('prenom')}}</span>
                                                </div>
                                              @enderror
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group mb-4">
                                      <input type="email" name="email" class="form-control form-thof form-width @error('email') is-invalid ombre-disable @enderror" placeholder="Adresse e-mail" value="{{ old('email') }}" />
                                      @error('email')
                                        <div class="invalid-feedback">
                                            <span>{{$errors->first('email')}}</span>
                                        </div>
                                      @enderror
                                  </div>
                                  <div class="form-group mb-4 password">
                                  
                                      <input type="password" id="password" name="password" class="form-control form-thof form-width password @error('password')invalid-error ombre-disable @enderror" placeholder="Mot de passe"/>
                                      <a onclick="afficherPassword()"><i id="eyes" class="bi bi-eye-fill eyes"></i></a>
                                      @error('password')
                                      <p class="error-password">{{ $errors->first('password') }}</p>
                                      @enderror

                                  </div>
                                      
                                  <div class="form-group mb-4 password">
                                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-thof form-width password @error('password')invalid-error ombre-disable @enderror" placeholder="Confirmation mot de passe"/>
                                      <a onclick="afficherConfirmationPassword()"><i class="bi bi-eye-fill eyes"></i></a>
                                  </div>

                                  <div class="form-group password">
                                    <input type="text" name="code_secret" class="form-control form-thof form-width password" placeholder="Code secret attribué" value="{{ old('code_secret') }}"/>
                                  </div>
                                  @error('code_secret')
                                    <p class="error-password">{{ $errors->first('code_secret') }}</p>
                                  @enderror
                                       
                                  <div class="pt-1 mt-4 mb-4 text-center">
                                      <button class="btn  btn-lg button-login fonts" type="submit">M'inscrire</button>
                                  </div>
                              </form>
                          </div>
                          <div class="col-md-1 col-lg-1"></div>
                      </div>
                      <div class="pt-1 mb-4 text-center">
                          <p class="small mb-5 pb-lg-2 fonts">Vous avez déjà un compte ?<a href="{{route('login')}}"> Connectez-vous !</a></p>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin formulaire d'inscription -->
    <!--Boucle de chargement-->
    <div id="preloader"></div>

@endsection


@section('fichierJS')
    <script src="{{ asset('js/login-register.js') }}"></script>
@endsection

