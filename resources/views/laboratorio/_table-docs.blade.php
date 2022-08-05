<table class="table table-striped">
    <thead>
        <tr>
            <th>Folio</th> 
            <th>Certificado</th> 
            <th>Calibró</th> 
            <th>Presión</th> 
            <th>No Serie</th>
            <th>Acciones</th>
        </tr>
    </thead> 
    <tbody>
        @foreach( $reports as $report)
        <tr>
            <td>{{$report->folio}}</td> 
            <td>{{$report->certificado}}</td> 
            <td>{{$report->calibro}}</td> 
            <td>{{$report->pressure}}</td>
            <td> {{$report->equipment[0]['no_serie']}}</td>
            <td>
                <a href="{{ route('cdc-toposervis', $report->folio ) }}" class="btn btn-info"> <i class="mdi mdi-file-pdf-box"></i></a>
                <a href="{{ route('certificaciones.edit', $report->id ) }}" class="btn btn-info"> <i class="mdi mdi-pencil"></i> </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>