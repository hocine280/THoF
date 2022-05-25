<div class="container mt-4" data-aos="zoom-in">
    <div class="p-1 rounded rounded-pill shadow-sm mb-4 search-bar">
        <form action="{{ route('form.search') }}" method="post" id="search-form">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button id="button-addon2" type="submit" class="btn btn-link text-warning"><i class="bi bi-search icon-search"></i></button>
                </div>
                <input type="text" name="q" id="q" placeholder="Rechercher" aria-describedby="button-addon2" class="form-control border-0 search">
            </div>
        </form>
    </div>
</div>
