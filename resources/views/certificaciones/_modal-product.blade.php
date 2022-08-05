<style>
    .table-responsive{
        height: 500px;
        padding-bottom: 10px;
    }
    .btn i{
        margin-right:0px;
    }
</style>
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header navbar text-white">
                <h5 class="modal-title" id="exampleModalLabel">Buscar Producto</h5>
                <button type="button" class="btn btn-md font-weight-bold text-white" style="font-size:22px;" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="searchProduct">
                    <div class="row d-flex">
                        <div class="col-4">
                            <input type="text" placeholder="Producto" name="name" class="form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" placeholder="Marca" name="brand" class="form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" placeholder="Modelo" name="model" class="form-control">
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
                                <th>#</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody id="productResults">
                            {{-- results ajax --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <div id="closeMP" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>