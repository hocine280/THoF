<div class="row">
    <div class="col-md-12">
        <h3><i class="bi bi-key-fill"></i> Double authentification</h3>
        <h6>Ajouter une sécurité supplémentaire à votre compte en utilisant la double authentification</h6>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        
        <div class="info">
            <p>
                Lorsque l'authentification à deux facteurs est activée, un code sécurisé et aléatoire vous sera demandé lors de l'authentification. Vous pouvez récupérer ce code à partir de l'application <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=fr&gl=US" target="_blank">Google Authenticator</a> de votre téléphone.
            </p>
        </div>



        @if ($this->enabled)
            <p class="text-bleu">La double authentification a été activée sur votre compte </p>
            @if ($this->enabled)
                <p>La double authentification est maintenant activée. Scannez le code QR suivant en utilisant l'application d'authentification de votre téléphone.</p>  
                
                <div class="row text-center mb-2">
                    <div class="col-md-12">           
                        {!! $this->user->twoFactorQrCodeSvg() !!}
                    </div>
                </div>
                <p>Veuillez enregistrer ces codes de récupération dans un endroit sécurisé, vous pourrez vous connecter par le biais de ces derniers, si vous n'avez pas accès à votre téléphone. </p>
                <div class="row text-center">
                    <div class="col-md-12">
                        @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                            {{ trim($code) }} <br>
                        @endforeach
                    </div>
                </div>
            @endif    
            <div class="row" style="text-align : right;">
                <form action="{{ route('two-factor.disable') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button data-aos="fade-right" type="submit" class="btn btn-lg button-disable fonts">Désactiver</button>
                </form><br>
            </div>
            
        @else
            <p class="text-bleu">Vous n'avez pas activé la double authentification</p>
            <form action="{{ route('two-factor.enable') }}" method="POST">
                @csrf
                <button data-aos="fade-right" type="submit" class="btn btn-lg button-enable fonts">Activer</button>
            </form>
        @endif

    </div>
</div>