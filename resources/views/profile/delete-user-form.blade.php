<div class="row">
    <div class="col-md-12">
        <h3>Supprimer mon compte</h3>
        <h6>La suppression de votre est définitive, une fois que vous aurez appuyer sur ce bouton, vous ne pourrez plus revenir en arrière.</h6>
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-12">
        
        <form action="{{ route('delete.user') }}" method="POST">

            
            <button type="submit"class="btn btn-lg button-disable fonts">Supprimer mon compte</button>
        </form>
    </div>
</div>
