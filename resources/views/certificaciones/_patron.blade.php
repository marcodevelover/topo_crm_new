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
                        <input type="hidden" name="equipment_id" value="{{$equipment->id}}">
                        <input type="text" class="form-control" name="equipment[patern_reference]" placeholder="Descripción" value="{{ $report->pattern['description'] }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticBrand" class="col-form-label">Certificado</label>
                        <input id="producBrand" type="text" class="form-control" name="equipment[brand]" placeholder="Marca" value="{{ $report->pattern['certificate'] }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticBrand" class="col-form-label">Marca</label>
                        <input id="producBrand" type="text" class="form-control" name="equipment[brand]" placeholder="Marca" value="{{ $report->pattern['brand'] }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticModel" class="col-form-label">Modelo</label>
                        <input id="producModel" type="text" class="form-control" name="equipment[model]" placeholder="Modelo" value="{{ $report->pattern['model'] }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticSerie" class="col-form-label">No. de serie</label>
                        <input id="producNoSerie" type="text" class="form-control" name="equipment[no_serie]" placeholder="No. de serie" value="{{ $report->pattern['no_serie'] }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-3">
                        <label for="staticEmail" class="col-form-label">Calibro</label>
                        <input id="productName" type="text" class="form-control" placeholder="Equipo" name="equipment[equipment]" value="{{ $report->pattern['calibrated'] }}" disabled>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <label for="staticEmail" class="col-form-label">Verificación</label>
                        <textarea class="form-control" name="equipment[specification]" placeholder="" disabled>{{ $report->pattern['comments'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="closeMC" class="btn btn-sm btn-danger font-weight-bold" data-bs-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>