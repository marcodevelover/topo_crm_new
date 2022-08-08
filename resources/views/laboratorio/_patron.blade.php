<style>
    .modal-content{
        border: 1px solid transparent !important;
    }
    #patterbModal .modal-lg {
        max-width: 80%;
    }
    @media(max-width:920px){
        #patterbModal{
            max-width:90%;
        }
    }
</style>
<div class="modal fade" id="patterbModal" tabindex="-1" aria-labelledby="patternLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header navbar text-white">
                <h5 class="my-1">Patrón de referencia</h5>
                <button type="button" class="btn btn-md font-weight-bold text-white" style="font-size:22px;" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-9">
                        <label for="staticProduct" name="product" class="col-form-label">Descripción</label>
                        <input type="hidden" name="equipment_id" value="{{ $pattern->id }}">
                        <input type="text" class="form-control" name="equipment[description]" placeholder="Descripción" value="{{ $pattern->description }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticBrand" class="col-form-label">Certificado</label>
                        <input id="producBrand" type="text" class="form-control" name="equipment[certificate]" placeholder="Certificado" value="{{ $pattern->certificate }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticBrand" class="col-form-label">Marca</label>
                        <input id="producBrand" type="text" class="form-control" name="equipment[brand]" placeholder="Marca" value="{{ $pattern->brand }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticModel" class="col-form-label">Modelo</label>
                        <input id="producModel" type="text" class="form-control" name="equipment[model]" placeholder="Modelo" value="{{ $pattern->model }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticModel" class="col-form-label">Tipo</label>
                        <input id="producTipo" type="text" class="form-control" name="equipment[tipo]" placeholder="Tipo" value="{{ $pattern->tipo }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticSerie" class="col-form-label">No. de serie</label>
                        <input id="producNoSerie" type="text" class="form-control" name="equipment[no_serie]" placeholder="No. de serie" value="{{ $pattern->no_serie }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticEmail" class="col-form-label">Calibro</label>
                        <input id="productName" type="text" class="form-control" placeholder="Calibró" name="equipment[calibrated]" value="{{ $pattern->calibrated }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <label for="staticEmail" class="col-form-label">Verificación</label>
                        <textarea class="form-control" name="equipment[specification]" placeholder="" rows="8" disabled>{{ $pattern->comments }}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="closeMC" class="btn btn-sm btn-danger font-weight-bold" data-bs-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>
