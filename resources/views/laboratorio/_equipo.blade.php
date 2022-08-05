<div class="card my-2">
    <div class="card-header d-flex justify-content-between">
        <h5 class="my-1">Datos del equipo</h5>
    </div>
    <div class="card-body  pt-2">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <label for="staticProduct" name="product" class="col-form-label">Equipo</label>
                <input type="hidden" name="equipment_id" value="{{$service->product->id}}">
                <input id="productName" type="text" class="form-control" placeholder="Equipo" name="equipment[equipment]" value="{{ old( 'equipment.equipment', $service->product->name ) }}">
            </div>
            <div class="col-sm-4 col-lg-4">
                <label for="staticBrand" class="col-form-label">Marca</label>
                <input id="producBrand" type="text" class="form-control" name="equipment[brand]" placeholder="Marca" value="{{ old( 'equipment.brand', $service->brand ) }}">
            </div>
            <div class="col-sm-4 col-lg-4">
                <label for="staticModel" class="col-form-label">Modelo</label>
                <input id="producModel" type="text" class="form-control" name="equipment[model]" placeholder="Modelo" value="{{ old( 'equipment.model', $service->model ) }}">
            </div>
            <div class="col-sm-4 col-lg-4">
                <label for="staticSerie" class="col-form-label">No. de serie</label>
                <input id="producNoSerie" type="text" class="form-control" name="equipment[no_serie]" placeholder="No. de serie" value="{{ old( 'equipment.no_serie', $service->serie ) }}">
            </div>
        </div>
    </div>
</div>