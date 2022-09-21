
@include('components.validate-errors')
@include('components.messages')

@include('certificaciones._cliente')
@include('certificaciones._equipo')
@include('certificaciones._form')
@include('certificaciones._report_Ahorizontal')


<div class="card my-2">
    <div class="card-header">
        <h5 class="my-1">Reporte de medición (Angulos Verticales)</h5>
    </div>
    <div class="card-body pt-2">
        <div class="row">
            <div class="col-sm-4 col-lg-4">
                <label for="staticEmail" class="col-form-label">Producto</label>
                <input type="text" class="form-control" name="product" placeholder="Producto" value="{{ old("", $equipment->equipment ) }}">
                
            </div>
            <div class="col-sm-3 col-lg-3">
                <label for="staticEmail" class="col-form-label">No. de serie</label>
                <input type="text" class="form-control" placeholder="No. de serial" name="no_serial" value="{{ old("no_serial", $equipment->no_serie ) }}">
            </div>
             <div class="col-sm-3 col-lg-3">
                <label for="staticEmail" class="col-form-label">Fecha</label>
                <input type="text" class="form-control" placeholder="" value="">
            </div>
            <div class="form-check form-switch col-sm-2 col-lg-2">
                <div><label class="form-check-label" for="flexSwitchCheckChecked">Cumple</label></div>
                <input class="form-check-input" name="angulos_v[cumple]" type="checkbox" id="flexSwitchCheckChecked" {{ $report->cumple == 1 ? 'checked' : '' }}>
            </div>
            <div class="col-sm-2 col-lg-2">
                <label for="staticEmail" class="col-form-label">Temperatura</label>
                <input type="text" class="form-control" placeholder="Temperatura" name="angulos_v[temperature]" value="{{ old("", $report->temperature) }}">
            </div>
      
            <div class="col-sm-4 col-lg-2">
                <label for="staticEmail" class="col-form-label">Presión</label>
                <input type="text" class="form-control" placeholder="Presión" name="angulos_v[pressure]" value="{{ old("pressure", $report->pressure) }}">
            </div>

            <div class="col-sm-4 col-lg-2">
                <label for="staticEmail" class="col-form-label">Húmedad</label>
                <input type="text" class="form-control" placeholder="Húmedad" name="angulos_v[humidity]" value="{{ old("humidity", $report->humidity) }}">
            </div>
            <div class="col-sm-4 col-lg-4">
                <label for="staticEmail" class="col-form-label">Observador</label>
                <input type="text" class="form-control" placeholder="Observador" name="angulos_v[observer]" value="{{ old("observer", $report->observer) }}">
            </div>
            <div class="col-sm-4 col-lg-2">
                <label for="staticEmail" class="col-form-label">Hora</label>
                <input type="text" class="form-control" placeholder="Hora" name="angulos_v[hour]" value="{{ old("hour", $report->hour) }}">
            </div>
            <div class="col-sm-12 col-lg-12">
                <label for="staticEmail" class="col-form-label">Observaciones</label>
                <textarea class="form-control" placeholder="Observaciones" name="angulos_v[observation]">{{ old('observation', $report->observation) }}</textarea>
            </div>
        </div>
    </div>
</div>
@include('certificaciones._table_Avertical')
@include('certificaciones._patron')