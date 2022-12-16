@extends('layout.app')
    @section('fichierCSS')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/breadcrumbs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profil.css') }}">

    @endsection
    @section('content')
        <!--Header-->
        @include('partials.header-dashboard')
        <!-- Fin Header -->

        <!-- Breadcrumbs -->
            <section class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center margin-top-mobile margin-top-breadcrumbs">
                    <h2><i class="bi bi-kanban-fill"></i> Tableau de bord</h2>
                    <ol>
                        <li><a class="link sans-vert" href="{{ route('index') }}">Accueil </a></li>
                        <li><a class="link active" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    </ol>
                    </div>
                </div>
            </section>
        <!-- Fin breadcrumbs-->

        @if(auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
            <!-- Créer un formulaire -->
                <div class="container" data-aos="">
                    <a href="{{ route('form.create') }}">
                        <div class="container card mt-5">
                            <div class="row">
                                <div class="col-md-12 border p-3">
                                    <div class="row">
                                        <div class="col-md-1 col-1 text-center"><i class="bi bi-ui-checks icon-section"></i></div>
                                        <div class="col-md-10 col-10 part-text"><p class="text-partie-dashboard">Créer le formulaire de votre choix</p></div>
                                        <div class="col-md-1 col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <!-- Fin création un formulaire -->


            <!-- Créer un formulaire -->
                <div class="container" data-aos="">
                    <a href="{{ route('form.my-list') }}">
                        <div class="container card mt-4">
                            <div class="row">
                                <div class="col-md-12 border p-3">
                                    <div class="row">
                                        <div class="col-md-1 col-1 text-center"><i class="bi bi-journal-bookmark-fill icon-section"></i></div>
                                        <div class="col-md-10 col-10 part-text"><p class="text-partie-dashboard">Voir mes formulaires crées</p></div>
                                        <div class="col-md-1 col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <!-- Fin création un formulaire -->
        @endif  

        @if (auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
            <!-- Voir ses demandes en cours et toutes ses demandes -->
            <div class="container" data-aos="">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('demande.index') }}">
                            <div class="container card mt-4">
                                <div class="row">
                                    <div class="col-md-12 border p-3">
                                        <div class="row">
                                            <div class="col-md-1 col-1 text-center"><i class="bi bi-hourglass-split icon-section"></i></div>
                                            <div class="col-md-10 col-10 part-text"><p class="text-partie-dashboard">Voir mes demandes en cours</p></div>
                                            <div class="col-md-1 col"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('demande.request-all') }}">
                            <div class="container card mt-4">
                                <div class="row">
                                    <div class="col-md-12 border p-3">
                                        <div class="row">
                                            <div class="col-md-1 col-1 text-center"><i class="bi bi-hourglass icon-section"></i></div>
                                            <div class="col-md-10 col-10 part-text"><p class="text-partie-dashboard">Voir toutes mes demandes</p></div>
                                            <div class="col-md-1 col"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Fin voir ses demandes en cours et toutes ses demandes-->
        @elseif (auth()->user()->role_id == 1 || auth()->user()->role_id == 4)
            <div class="container" data-aos="">
                <a href="{{ route('demande.index') }}">
                    <div class="container card mt-4">
                        <div class="row">
                            <div class="col-md-12 border p-3">
                                <div class="row">
                                    <div class="col-md-1 col-1 text-center"><i class="bi bi-hourglass-split icon-section"></i></div>
                                    <div class="col-md-10 col-10 part-text"><p class="text-partie-dashboard">Voir mes demandes en cours</p></div>
                                    <div class="col-md-1 col"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="container" data-aos="">
                <a href="{{ route('demande.request-all') }}">
                    <div class="container card mt-4">
                        <div class="row">
                            <div class="col-md-12 border p-3">
                                <div class="row">
                                    <div class="col-md-1 col-1 text-center"><i class="bi bi-hourglass icon-section"></i></div>
                                    <div class="col-md-10 col-10 part-text"><p class="text-partie-dashboard">Voir toutes mes demandes</p></div>
                                    <div class="col-md-1 col"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if(auth()->user()->role_id == 3)
            <!-- Voir la totalité des demandes du site -->
            <div class="container" data-aos="">
                <a href="{{ route('demande.all-demande-admin') }}">
                    <div class="container card mt-4">
                        <div class="row">
                            <div class="col-md-12 border p-3">
                                <div class="row">
                                    <div class="col-md-1 col-1 text-center"><i class="bi bi-ui-checks icon-section"></i></div>
                                    <div class="col-md-10 col-10 part-text"><p class="text-partie-dashboard">Voir la totalité des demandes de la plateforme</p></div>
                                    <div class="col-md-1 col"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Voir la totalité des demandes du site -->
        @endif

        @if (auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
            <!-- Réponse à mes formulaires -->
            <div class="container" data-aos="">
                <a href="{{ route('reply-formulaire.index') }}">
                    <div class="container card mt-4">
                        <div class="row">
                            <div class="col-md-12 border p-3">
                                <div class="row">
                                    <div class="col-md-1 col-1 text-center"><i class="bi bi-chat-right-quote-fill icon-section"></i></div>
                                    <div class="col-md-10 col-10 part-text"><p class="text-partie-dashboard">Réponse à mes formulaires</p></div>
                                    <div class="col-md-1 col"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Fin réponse à mes formulaires -->
        @endif

        <div class="container" data-aos="">
            <div class="row">

                {{-- <div class="col-md-6">
                    <div class="container card mt-4">
                        <div class="row">
                            <div class="col-md-12 border p-3">
                                <div class="row">
                                    <div class="col-md-1 col-1 text-center"><i class="bi bi-chat-dots-fill icon-section"></i></div>
                                    <div class="col-md-10 col-10 part-text"><p class="text-partie-dashboard">Messages</p></div>
                                    <div class="col-md-1 col-1"><p class="number-chat">1</p></div>
                                </div>
                                <div class="row chat mt-4 p-2 active-chat">
                                    <div class="row info-chat">
                                        <div class="col-md-8 col-5"><p class="nom-chat">Nom Prénom</p></div>
                                        <div class="col-md-4 col-7 text-right date"><p class="text-date">16/11/2021 à 17:23</p></div>
                                    </div>
                                    <i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae illo similique ut?</i>
                                </div>
                                <div class="row chat mt-4 p-2">
                                    <div class="row info-chat">
                                        <div class="col-md-8 col-5"><p class="nom-chat">Nom Prénom</p></div>
                                        <div class="col-md-4 col-7 text-right date"><p class="text-date">16/11/2021 à 17:23</p></div>
                                    </div>
                                    
                                    <i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae illo similique ut?</i>
                                </div>
                                <div class="row chat mt-4 p-2">
                                    <div class="row info-chat">
                                        <div class="col-md-8 col-5"><p class="nom-chat">Nom Prénom</p></div>
                                        <div class="col-md-4 col-7 text-right date"><p class="text-date">16/11/2021 à 17:23</p></div>
                                    </div>
                                    
                                    <i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae illo similique ut?</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-md-12">
                    <div class="container card mt-4" >
                        <div class="row">
                            <div class="col-md-12 border p-3">
                                <div class="row">
                                    <div class="col-md-1 col-1 text-center"><i class="bi bi-ui-checks icon-section"></i></div>
                                    <div class="col-md-10 col-10 part-text"><p class="text-partie-dashboard">Voir tous les formulaires existants</p></div>
                                    <div class="col-md-1 col"></div>
                                    
                                </div> 
                                @foreach ($listeFormulaires as $listeFormulaire)
                                    <a href="{{ route('demande.show', $listeFormulaire->id) }}">
                                        <div class="row chat mt-3 p-2 active-form">
                                            <div class="row info-chat">
                                                <div class="col-md-8 col-5"><p class="nom-chat">{{ $listeFormulaire->nom_formulaire }}</p></div>
                                                <div class="col-md-4 col-7 text-right date"><p class="text-date">{{ $listeFormulaire->created_at->format('d/m/Y') }}</p></div>
                                            </div>
                                            
                                            <i>{{ $listeFormulaire->description_formulaire }}</i>
                                        </div>
                                    </a>
                                @endforeach
                                <div class="row text-center mt-4">
                                    <a href="{{ route('form.all-list') }}" class="btn button-green"><i class="bi bi-plus-square"></i> Voir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
    @endsection
    