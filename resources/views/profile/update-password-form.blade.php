<div class="row">
    <div class="col-md-12">
        <h3><i class="bi bi-shield-lock-fill"></i> Mon mot de passe</h3>
        <h6>Mettez à jour votre identifiant de connexion</h6>
    </div>
</div>
    
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @METHOD('PUT')
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group mb-4 password">
                        <label for="current_password"> Mot de passe actuel </label>
                        <input type="password" name="current_password" id="current_password" class="form-control form-thof form-width password {{ $errors->getBag('updatePassword')->has('current_password') ? 'invalid-error' : '' }}" placeholder="*********"/>
                        <a onclick="afficherCurrentPassword()"><i id="eyes" class="bi bi-eye-fill"></i></a>

                        @if ($errors->getBag('updatePassword')->has('current_password'))
                                <div class="col-12 text-center error-password">{{ $errors->getBag('updatePassword')->first('current_password') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group mb-4 password">
                        <label for="password">Nouveau mot de passe </label>
                        <input type="password" id="password" name="password" class="form-control form-thof form-width password {{ $errors->getBag('updatePassword')->has('password') ? 'invalid-error' : '' }}" placeholder="Minimum 8 caractères" />
                        <a onclick="afficherNewPassword()"><i class="bi bi-eye-fill"></i></a>
                        @if ($errors->getBag('updatePassword')->has('password'))
                                <div class="col-12 text-center error-password">{{ $errors->getBag('updatePassword')->first('password') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group mb-4 password ">
                        <label for="password"> Confirmation du nouveau mot de passe </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-thof form-width password {{ $errors->getBag('updatePassword')->has('password_confirmation') ? 'invalid-error' : '' }}" placeholder="Minimum 8 caractères" />
                        <a onclick="afficherConfirmationPassword()"><i class="bi bi-eye-fill"></i></a>
                        @if ($errors->getBag('updatePassword')->has('password_confirmation'))
                                <div class="col-12 text-center error-password">{{ $errors->getBag('updatePassword')->first('password_confirmation') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="text-right" data-aos="fade-right">
                        <button type="submit" class="btn btn-lg button-login fonts">Changer mot de passe</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>