<input type="hidden" name="_token" value="{{ csrf_token() }}">
<style>
    svg{
        width: 100%;
    }
    .table th, 
    .table td,
    tbody td{
        width: 70px!important;
    }
    i.input-helper{
        display: none;
    }
    #flexSwitchCheckChecked{
        width: 50px;
        height: 26px;
        margin-top:10px;
        margin-left: 20px;
    }
</style>
@include('components.validate-errors')
@include('components.messages')

<div class="card my-2">
    <div class="card-header">
        <h5 class="my-1">Reporte de medición (Pruebas de distanciometro usando prisma)</h5>
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
                <input type="text" class="form-control fp_date" name="prisma[date]" placeholder="Fecha" value="{{ old("date", $report->hour) }}">
            </div>
            <div class="form-check form-switch col-sm-2 col-lg-2">
                <div><label class="form-check-label" for="flexSwitchCheckChecked">Cumple</label></div>
                <input class="form-check-input" name="prisma[cumple]" type="checkbox" id="flexSwitchCheckChecked" {{ $report->cumple == 1 ? 'checked' : '' }}>
            </div>
            <div class="col-sm-2 col-lg-2">
                <label for="staticEmail" class="col-form-label">Temperatura</label>
                <input type="text" class="form-control" placeholder="Temperatura" name="prisma[temperature]" value="{{ old("", $report->temperature) }}">
            </div>
      
            <div class="col-sm-4 col-lg-2">
                <label for="staticEmail" class="col-form-label">Presión</label>
                <input type="text" class="form-control" placeholder="Presión" name="prisma[pressure]" value="{{ old("pressure", $report->pressure) }}">
            </div>

            <div class="col-sm-4 col-lg-2">
                <label for="staticEmail" class="col-form-label">Húmedad</label>
                <input type="text" class="form-control" placeholder="Húmedad" name="prisma[humidity]" value="{{ old("humidity", $report->humidity) }}">
            </div>
            <div class="col-sm-4 col-lg-4">
                <label for="staticEmail" class="col-form-label">Observador</label>
                <input type="text" class="form-control" placeholder="Observador" name="prisma[observer]" value="{{ old("observer", $report->observer) }}">
            </div>
            <div class="col-sm-4 col-lg-2">
                <label for="staticEmail" class="col-form-label">Hora</label>
                <input type="text" class="form-control fp_time" placeholder="Hora" name="prisma[hour]" value="{{ old("hour", $report->hour) }}">
            </div>

            <div class="col-sm-12 col-lg-12">
                <label for="staticEmail" class="col-form-label">Observaciones</label>
                <textarea class="form-control" placeholder="Observaciones" name="prisma[observation]">{{ old('observation', $report->observation) }}</textarea>
            </div>
        </div>
    </div>
</div>
@include('certificaciones._table')
@include('certificaciones._patron')