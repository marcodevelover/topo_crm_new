<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header navbar text-white">
                <h5 class="modal-title" id="exampleModalLabel">Buscar cliente</h5>
                <button type="button" class="btn btn-md font-weight-bold text-white" style="font-size:22px;" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="searchCustomer">
                    <div class="row d-flex">
                        <div class="col-4">
                            <input type="text" placeholder="Nombre" name="customer" class="form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" placeholder="RFC" name="customer" class="form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" placeholder="Correo" name="customer" class="form-control">
                        </div>
                        <div class="col-12 my-2 text-right">
                            <button type="submit" class="add btn btn-primary font-weight-medium">Buscar</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nombre</td>
                                <td>RFC</td>
                                <td>Empresa</td>
                            </tr>
                        </thead>
                        <tbody id="results">
                            {{-- results ajax --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <div id="closeMC" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>