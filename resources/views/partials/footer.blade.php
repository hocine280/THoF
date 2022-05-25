<footer id="footer">
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-lg-12">
            <p class="text-center mt-2 lien">Liens utiles</p>
            <ul class="text-center">
            <li><a href="#accueil">Accueil</a></li>
            <li><a href="#a-propos">A Propos</a> </li>
            <li><a href="{{ route('login') }}">Connexion</a></li>
            <li><a href="">Mentions légales</a></li>
            </ul>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
        <img src="{{ asset('img/logo.png') }}" alt=""> <br>
        &copy; Copyright <strong><span>THoF</span></strong> | Tous droits réservés
        </div>
    </div>
</footer>