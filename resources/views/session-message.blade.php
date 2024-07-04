@if (session()->has('message'))
    <div class="d-flex justify-content-center">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
