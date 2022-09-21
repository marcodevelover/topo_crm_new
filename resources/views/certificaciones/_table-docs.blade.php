<table class="table table-striped">
    <thead>
        <tr>
            <th>Folio</th> 
            <th>Producto</th>
            <th>Certificado</th>
            <th>Calibró</th> 
            <th>No Serie</th>
            <th>Tipo</th>
            <th>Última fecha de actualización</th>
            <th>Acciones</th>
        </tr>
    </thead>  
    <tbody>
        @foreach( $reports as $report)
        <tr>
            <td>{{$report->folio}}</td>
            <td>{{$report->equipment[0]['equipment']}}</td> 
            <td>{{$report->pattern['certificate']}}</td> 
            <td>{{$report->pattern['calibrated']}}</td> 
            <td> {{$report->pattern['no_serie']}}</td>
            <td> {{$report->tipo}}</td>
            <td>{{ strftime("%d %B de %Y", strtotime($report->updated_at)) }} {{ date('H:i:s', strtotime($report->updated_at)) }}</td>
            <td>
                <a href="{{ route('cdc-toposervis', $report->folio ) }}" class="btn btn-info" title="Ver PDF" target="_blank"> <i class="mdi mdi-file-pdf-box"></i></a>
                @if( Auth::user()->rol == 'admin' )
                    <a href="{{ route('certificaciones.edit', $report->id ) }}" class="btn btn-info" title="Editar"> <i class="mdi mdi-pencil"></i> </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- 
    1.- Filtros de busqueda en certificaciones y en laboratorio
    2.- El nombre de laboratorio cambiarlo (Jorge)
    3.- La firma del gerente es fijo, la firma del ingeniero en servicio es del usuario que esta creando el document
    4.- Mostrar leyend en cerfiticar - estación como en construcción *
    5.- Mensaje de validación *
    
    --}}