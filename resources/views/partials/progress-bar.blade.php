@if ($demande->statut_demande_id == 1)
    <div class="container mt-4" data-aos="fade-left">
        <div class="col-md-12 text-center">
            <p class="text-center mb-0 mt-2 font-weight-bold text-progress-bar">Etat de l'avancement de votre demande : Demande soumise, en cours de traitement </p>
        </div>
        <div class="col-md-12 text-center mt-2">
            <div class="progress text-center">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
            </div>
        </div>
    </div>
@elseif ($demande->statut_demande_id == 2)
    <div class="container mt-4" data-aos="fade-left">
        <div class="col-md-12 text-center">
            <p class="text-center mb-0 mt- font-weight-bold text-progress-bar">Etat de l'avancement de votre demande : Votre demande a été refusé, veuillez la modifier afin qu'elle soit de nouveau traiter </p>
        </div>
        <div class="col-md-12 text-center mt-2">
            <div class="progress text-center">
                <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-red" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 5%">5%</div>
            </div>
        </div>
    </div>
@elseif ($demande->statut_demande_id == 3)
    <div class="container mt-4" data-aos="fade-left">
        <div class="col-md-12 text-center">
            <p class="text-center mb-0 mt-2 font-weight-bold text-progress-bar">Etat de l'avancement de votre demande : Votre demande à été confirmée avec succès </p>
        </div>
        <div class="col-md-12 text-center mt-2">
            <div class="progress text-center">
                <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-green" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
            </div>
        </div>
    </div>
@endif