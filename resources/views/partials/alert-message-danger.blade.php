@if(session('danger'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show alert-danger-alt mt-4" role="alert">
                    <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-circle icon-close"></i> {{session('danger')}}</button>
                </div>
            </div>
        </div>
    </div>
@endif