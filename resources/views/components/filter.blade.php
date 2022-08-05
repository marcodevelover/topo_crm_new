<div class="card  mb-4">
    <div class="card-body pt-3 pb-1">
        <div class="row">
            <form action="{{ route($route) }}" class="col-md-12 col-lg-12" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p>Buscar documento</p>
                <div class="add-items d-flex">
                    <input type="text" class="form-control todo-list-input" name="folio" placeholder="Folio">
                    <button class="btn btn-primary font-weight-medium">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>