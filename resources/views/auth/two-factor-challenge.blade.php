@extends('layout/app')

@section('fichierCSS')
    <link rel="stylesheet" href="{{asset('css/login-register.css')}}">
@endsection


@section('content')

    <!-- Double authentification -->
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
                      <h1 class="text-center mb-3 pb-3 fonts">Double authentification</h1>
  
                      <div class="row">
                          <div class="col-md-1 col-lg-1"></div>
                          <div class="col-md-10 col-lg-10">
                                <form class="text-center" method="POST" action="{{route('two-factor.login')}}">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <input type="number" name="code" id="code" class="form-control form-thof form-width" placeholder="Code de confirmation"/>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="hidden" name="recovery_code" id="recovery_code" class="form-control form-thof form-width" placeholder="Code de récupération" />
                                    </div>
                                    <div class="pt-1 mb-3 text-center">
                                        <a class="small fonts" id="link_recovery_code" href="#" onclick="afficherRecoveryCode()">Utiliser un code de récupération</a>
                                        <a class="small fonts" id="link_code" style="display: none;" href="#" onclick="afficherRecoveryCode()">Utiliser Google Autenticator</a>
                                    </div>
                                    <div class="pt-1 mb-4 text-center">
                                        <button class="btn  btn-lg button-login fonts" type="submit">Confirmer</button>
                                    </div>
                                </form>
                          </div>
                          <div class="col-md-1 col-lg-1"></div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Boucle de chargement-->
    <div id="preloader"></div>

@endsection


@section('fichierJS')
    <script src="{{ asset('js/login-register.js') }}"></script>
@endsection

