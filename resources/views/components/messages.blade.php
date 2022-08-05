@if(session('message'))
    <div role="alert" class="alert alert-{{ ( session('clase') ? session('clase') : 'success' ) }} d-flex justify-content-between">
        {{ session('message') }}
        <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
    </div>
@endif