@extends('layout/app')

@section('fichierCSS')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <!-- Header -->
      @include('partials/header')
    <!-- Fin du Header -->

    <!-- Page de présentation -->
    <section id="accueil">

      <div class="container">
          <div class="row justify-content-between">
              <div class="col-lg-7 pt-5 pt-lg-0 order-1 order-lg-1 d-flex align-items-center">
                  <div data-aos="zoom-out">
                      <h1>Créer le formulaire de votre choix avec <span>THoF</span></h1>
                      <h2> The House of Forms</h2>
                      <div class="text-center text-lg-start">
                          <a href="#a-propos" class="btn-get-started scrollto">Découvrir</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 order-2 order-lg-2 accueil-img" data-aos="zoom-out" data-aos-delay="300">
                  <img src="img/img-vect-accueil.png" class="img-fluid animated" alt="">
              </div>
          </div>
      </div>
  
      <!-- Bannière flottante -->
      <svg class="accueil-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
          <defs>
              <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
          </defs>
          <g class="wave1">
              <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
          </g>
          <g class="wave2">
              <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
          </g>
          <g class="wave3">
              <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
          </g>
      </svg>
    <!-- Fin bannière flottante -->
    </section>

    <!-- Fin de la page de présentation-->

    <main id="main">
      <!-- A propos -->
      <section id="a-propos" class="a-propos">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-xl-5 col-lg-6 img-a-propos d-flex justify-content-center align-items-stretch" data-aos="fade-right">
                  </div>
      
                  <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
                      <h3>Création de formulaire dynamique</h3>
                      <p>THoF vous permet de créer le formulaire de votre choix, en sélectionnant le destinataire par le biais de nombreux filtres.</p>
          
                      <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                          <div class="icon"><i class="bi bi-file-earmark-text"></i></div>
                              <h4 class="title">Vous ne savez pas où en est votre demande ?
                          </h4>
                          <p class="description">Grâce à THoF vous pourrez suivre la demande que vous avez faite via un formulaire tout simplement depuis votre <a class="icon-margin-right" href="{{route('dashboard')}}">tableau de bord</a>.<br>
                              Il n'aura jamais été aussi simple de réaliser une tâche administrative !
                          </p>
                      </div>
          
                      <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                          <div class="icon"><i class="bi bi-ui-checks"></i></div>
                              <h4 class="title">Editez votre convention de stage en quelques clics !</h4>
                          <p class="description">Vous venez de trouver votre stage et il vous reste votre convention à faire ? Grâce à THoF vous pouvez réaliser votre convention en ligne et savoir où elle en est en quelques clics.
                              Toute la procèdure se fait automatiquement et simplement au même endroit. Une fois finalisé vous pourrez récupèrer votre convention complété et signé au format PDF.
                          </p>
                      </div>
          
                      <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                          <div class="icon"><i class="bi bi-briefcase"></i></div>
                          <h4 class="title">L'outil administratif par excellence !</h4>
                          <p class="description">THoF vous permettra de réaliser toutes vos tâches administratives au sein de l'université en quelques clics, de manière dématérialisé et en toute sécurité. <a href="{{ url('/error/403') }}">Chuck Norris</a> veille 😉</p>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Fin de A Propos -->
    </main>


    <!-- Footer -->
        @include('partials/footer')
    <!-- Fin Footer -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!--Boucle de chargement-->
    <div id="preloader"></div>
@endsection