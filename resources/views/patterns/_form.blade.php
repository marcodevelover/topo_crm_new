<div class="card">
    <div class="card-header">
        @include('components.validate-errors')
        @include('components.messages')
    </div>
    <div class="card-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-9">
                <label for="staticProduct" name="product" class="col-form-label">Descripción</label>
                <input type="hidden" name="equipment_id" value="{{$pattern->id}}">
                <input type="text" class="form-control" name="description" placeholder="Descripción" value="{{ old( 'description',$pattern->description) }}">
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-3">
                <label for="staticBrand" class="col-form-label">Certificado</label>
                <input id="producBrand" type="text" class="form-control" name="certificate" placeholder="Marca" value="{{ old( 'certificate',$pattern->certificate) }}">
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-3">
                <label for="staticBrand" class="col-form-label">Marca</label>
                <input id="producBrand" type="text" class="form-control" name="brand" placeholder="Marca" value="{{ old( 'brand',$pattern->brand) }}">
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-3">
                <label for="staticModel" class="col-form-label">Modelo</label>
                <input id="producModel" type="text" class="form-control" name="model" placeholder="Modelo" value="{{ old( 'model',$pattern->model) }}">
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-3">
                <label for="staticSerie" class="col-form-label">No. de serie</label>
                <input id="producNoSerie" type="text" class="form-control" name="no_serie" placeholder="No. de serie" value="{{ old( 'no_serie',$pattern->no_serie) }}">
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-3">
                <label for="staticEmail" class="col-form-label">Calibro</label>
                <input id="productName" type="text" class="form-control" placeholder="Equipo" name="calibrated" value="{{ old( 'calibrated',$pattern->calibrated) }}">
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <label for="staticEmail" class="col-form-label">Verificación</label>
                <textarea class="form-control" name="comments" placeholder="" rows="5">{{ old('comments',$pattern->comments) }}</textarea>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="btn-group my-3">
                    <a href="{{ route('patrones.index') }}" class="btn btn-dark btn-lg"><i class="mdi mdi-keyboard-backspace"></i> Regresar</a>
                    <button type="submit" class="btn btn-primary btn-lg"> <i class="mdi mdi-content-save"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>