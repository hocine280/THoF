@php
    use App\Models\Utilisateur\Formation;
@endphp
<div class="row">
    <div class="col-md-12">
        <h3><i class="bi bi-person-fill"></i> Mes informations personnelles</h3>
        <h6>Mettez à jour vos informations</h6>
    </div>
</div>



    
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ route('user-profile-information.update') }}">
            @csrf
            @METHOD('PUT')
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <div class="form-group mb-2">
                        <label for="nom"> Nom </label>
                        <input type="text" name="nom" id="nom" class="form-control form-thof form-width uppercase {{ $errors->getBag('updateProfileInformation')->has('nom') ? 'is-invalid' : '' }}" placeholder="Nom" value="{{ auth()->user()->nom }}" />
                        @if ($errors->getBag('updateProfileInformation')->has('nom'))
                                <div class="col-12 text-center invalid-feedback">{{ $errors->getBag('updateProfileInformation')->first() }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-2 password">
                        <label for="prenom"> Prénom </label>
                        <input type="text" name="prenom" class="form-control form-thof form-width {{ $errors->getBag('updateProfileInformation')->has('prenom') ? 'is-invalid' : '' }}" placeholder="Prénom" value="{{ auth()->user()->prenom }}">
                        @if ($errors->getBag('updateProfileInformation')->has('prenom'))
                                <div class="col-12 text-center invalid-feedback">{{ $errors->getBag('updateProfileInformation')->first() }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="email"> Adresse e-mail </label>
                        <input type="email" name="email" class="form-control form-thof form-width {{ $errors->getBag('updateProfileInformation')->has('email') ? 'is-invalid' : '' }}" placeholder="Adresse e-mail" value="{{ auth()->user()->email }}" />
                        @if ($errors->getBag('updateProfileInformation')->has('email'))
                                <div class="col-12 text-center invalid-feedback">{{ $errors->getBag('updateProfileInformation')->first() }}</div>
                        @endif
                    </div>
                </div>
            </div>
            @if(auth()->user()->role_id == 1)
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="nom"> Rôle </label>
                            <span class="form-control form-thof form-width">Etudiant</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="nom"> Numero étudiant </label>
                            <input type="text" name="num_etudiant" class="form-control form-thof form-width {{ $errors->getBag('updateProfileInformation')->has('num_etudiant') ? 'is-invalid' : '' }}" placeholder="Numéro étudiant" value="{{ auth()->user()->num_etudiant }}"/>
                            @if ($errors->getBag('updateProfileInformation')->has('num_etudiant'))
                                <div class="col-12 text-center invalid-feedback">{{ $errors->getBag('updateProfileInformation')->first() }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            
                @php
                    $formations = Formation::all();
                @endphp
                @if (auth()->user()->nom_formation == null)
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="nom"> Ma formation </label>
                                <select name="nom_formation" class="form-select form-thof form-width {{ $errors->getBag('updateProfileInformation')->has('nom_formation') ? 'is-invalid' : '' }}">
                                    <option value="">Choisir ma formation</option>
                                    @foreach ($formations as $formation)
                                        <option value="{{ $formation->id }}">{{ $formation->nom_formation }}</option>
                                    @endforeach
                                    @if ($errors->getBag('updateProfileInformation')->has('nom_formation'))
                                        <div class="col-12 text-center invalid-feedback">{{ $errors->getBag('updateProfileInformation')->first() }}</div>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                @else 
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label > Ma formation </label>
                                @php
                                    $formation = Formation::where('id', '=', auth()->user()->nom_formation)->get()->first(); 
                                @endphp
                                <span class="form-control form-thof form-width">{{ $formation->nom_formation }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if (auth()->user()->role_id == 2)
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="nom"> Rôle </label>
                            <span class="form-control form-thof form-width">Professeur</span>
                        </div>
                    </div>
                </div>
            @endif
            @if (auth()->user()->role_id == 3)
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="nom"> Rôle </label>
                        <span class="form-control form-thof form-width role">Administrateur</span>
                    </div>
                </div>
            </div>
            @endif
            @if (auth()->user()->role_id == 4)
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label for="nom"> Rôle </label>
                        <span class="form-control form-thof form-width">Personnel hors université</span>
                    </div>
                </div>
            </div>
            @endif

            <div class="row mt-2">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="text-right" data-aos="fade-right">
                        <button type="submit" class="btn btn-lg button-login fonts">Sauvegarder</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>