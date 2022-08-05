<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            @page {
                margin: 0cm 0cm;
            }
            body {
                margin-top: 1cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }
            /** Definir las reglas del pie de página **/
            footer {
                font-size:12px;
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
                padding:0cm 2cm 1cm 0cm;
                width: 100%;
            }
            table{
                margin:20px 0px;
            }
            table tr,
            table tr td{
                vertical-align:top;
            }
            table tr th{
                vertical-align:middle;
            }
            .bg-topo{background-color:#103442;color:#fff}
            .logo{
                position:absolute;
                top:50%;
                left:50%;
                opacity:0.1;
                transform: translate(-50%,-50%);
            }
        </style>
    </head>
    <body>
        <footer>
            <table class="table table-sm text-center">
                <tr style="padding:1px 0px;">
                    <td style="border:0px;padding:0px;">Toposervis s de rl de cv</td>
                    <td style="border:0px;padding:0px;">Certificado no ct-0001</td>
                </tr>
                <tr style="padding:1px 0px;">
                    <td style="border:0px;padding:0px;">www.toposervi.com</td>
                   
                    <td style="border:0px;padding:0px;">Queda prohibida la reproducción</td>
                </tr>
                <tr style="padding:1px 0px;">
                    <td style="border:0px;padding:0px;">99999999</td>
                    <td style="border:0px;padding:0px;">total o parcial</td>
                </tr>
            </table>
        </footer>
        <main>
            <img class="logo" src="https://certificaciones.toposervis.com.mx/assets/images/Toposervis-Logo.png">
            <table>
                <tr>
                    <td>
                        <img src="https://certificaciones.toposervis.com.mx/assets/images/Toposervis-Logo.png" width="120">
                    </td>
                    <td class="text-center">
                        <p style="font-size:22px;font-weight:bold;line-height:28px;">TOPOSERVIS S DE RL DE CV CERTIFICADO DE CALIBRACION </p>
                        <strong>NO. CT-0001</strong>
                    </td>
                    <td>
                        <img src="https://certificaciones.toposervis.com.mx/assets/images/Toposervis-Logo.png" width="120">
                    </td>
                </tr>
            </table>
            <table class="table table-sm" style="border:0px;">
                <tr class="bg-topo">
                    <th colspan="2" style="border:0px;vertical-align:middle"> Datos del cliente</th>
                </tr>
                <tr>
                    <td style="border:0px;">Nombre</td><td style="border:0px;">{{$customer['name']}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Dirección</td><td style="border:0px;">{{$customer['address']}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Correo</td><td style="border:0px;">{{$customer['email']}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Teléfono</td><td style="border:0px;">{{$customer['phone']}}</td>
                </tr>
            </table>
            <table class="table table-sm" style="border:0px;">
                <tr class="bg-topo">
                    <th colspan="2">Datos del equipo</th>
                </tr>
                <tr>
                    <td style="border:0px;">Equipo</td><td style="border:0px;">{{$equipment['equipment']}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Marca</td><td style="border:0px;">{{$equipment['brand']}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Modelo</td><td style="border:0px;">{{$equipment['model']}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">No. serie</td><td style="border:0px;">{{$equipment['no_serie']}}</td>
                </tr>
            </table>
            <table class="table table-sm" style="border:0px;">
                <tr class="bg-topo">
                    <th colspan="2">Patrón de referencia</th>
                </tr>
                <tr>
                    <td style="border:0px;">Descripcion</td><td style="border:0px;">{{$equipment->patern_reference}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Marca: {{$equipment->brand}}</td><td style="border:0px;">Modelo: {{$equipment->model}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">No. serie: {{$equipment->no_serie}}</td><td style="border:0px;">Certificado: {{$equipment->equipment}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Calibro</td><td style="border:0px;">Calibro</td>
                </tr>
                <tr>
                    <td style="border:0px;">Descripción</td><td style="border:0px;">Descripción</td>
                </tr>
            </table>
            <table class="table table-sm text-center" style="border:0px;margin-top:60px;">
                <tr>
                    <td colspan="1" style="border:0px;"></td><td style="border:0px;"></td>
                </tr>
                <tr>
                    <td colspan="1">Cumple</td><td>No cumple</td>
                </tr>
            </table>
        </main>
        <div style="page-break-after:always;"></div>
        <main>
            <img class="logo" src="https://certificaciones.toposervis.com.mx/assets/images/Toposervis-Logo.png">
            
            <p style="font-size:24px;font-weight:bold;text-align:center;margin-top:1cm;margin-bottom:1cm;">Toposervis laboratorio de calibración</p>
            <table class="table table-sm" style="border:0px;">
                <tr class="bg-topo">
                    <th colspan="2">Reporte de medición </th>
                </tr>
                <tr>
                    <td style="border:0px;">Fecha: {{$report->created_at}}</td>
                    <td style="border:0px;">Temperatura: {{$report->temperature}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Producto: {{$report->product}}</td>
                    <td style="border:0px;">Presión: {{$report->pressure}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">No serial: {{$report->no_serie}}</td>
                    <td style="border:0px;">Húmedad: {{$report->humidity}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Obvservador</td>
                    <td style="border:0px;">{{ $report->observation}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Hora: {{ date('H:i:s', strtotime($report->created_at)) }}</td>
                </tr>
            </table>
            <table class="table table-sm text-center" style="border:0px;margin-top:2cm;">
                <tr>
                    <td style="border:0px;">
                        <img src="https://certificaciones.toposervis.com.mx/assets/images/Toposervis-Logo.png">
                    </td>
                    <td style="border:0px;">
                        <img src="https://certificaciones.toposervis.com.mx/assets/images/Toposervis-Logo.png">
                    </td>
                </tr>
                <tr>
                    <td style="border:0px;">
                        David Lope sanchez <br>
                        Gerente de laboratorio
                    </td>
                    <td style="border:0px;">
                        Cesar eljure<br>
                        Ingeniero de servicio
                    </td>
                </tr>
            </table>

                <div style="margin-top:1cm;" class="text-center">
                    <p>Especificaciones del instrumento:</p>
                </div>
                <div class="text-center">
                    <p>Precisión (desviación estándar para la nivelación de doble recorrido en 1 km): 0,7 mm</p>
                </div>
                <div class="text-center">
                    <p>Resultados de la prueba</p>
                    <strong>sisolev= 1.23</strong>
                </div>
            
        </main>
        <div style="page-break-after:always;"></div>
        <main>


            <table class="table table-striped table-sm">
                <thead class="text-center">
                    <tr>
                        <th>j</th>
                        <th>X <sub>AJ</sub></th>
                        <th>X <sub>BJ</sub></th>
                        <th>dj</th>
                        <th>rj</th>
                        <th>r<sup>2</sup>j</th>
                        <th>j</th>
                        <th>X <sub>AJ</sub></th>
                        <th>X <sub>BJ</sub></th>
                        <th>dj</th>
                        <th>rj</th>
                        <th>r<sup>2</sup>j</th>
                    </tr>
                </thead>
                <tbody id="reportMedicion" class="text-center">
                    <?php $index1 = 1; $index2 = 21; $count = 0; ?>
                    @foreach( $report->measurements['xaj'] as $c )
                        <tr id="row-{{ $index1 }}">
                            <td> {{ $index1++ }} </td>
                            <td> {{$c}} </td>
                            <td> {{ $report->measurements['xbj'][$count] }} </td>
                            <td> {{ $c - $report->measurements['xbj'][$count] }} </td>
                            <td> <span class="rj1"></span> </td>
                            <td class="r2j1"></td>
                            <td> {{ $index2++ }} </td>
                            <td> {{ $report->measurements['xaj2'][$count] }} </td>
                            <td> {{ $report->measurements['xbj2'][$count] }} </td>
                            <td class="dj2">{{ $report->measurements['xaj2'][$count] - $report->measurements['xbj2'][$count] }}</td>
                            <td class="rj2"></td>
                            <td class="r2j2"></td>
                        </tr>
                        <?php $count ++; ?>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <h5>sisolev=123</h5>   
            </div>
            <div class="text-center">
                <p>Configuracion para la calibrcaion</p>
                <img src="{{ asset('/images/reporte-medicion.png') }}" class="img-fluid">
            </div>
            <div class="text-center">
                <p>Observaciones</p>
                {{ $report->observation}}
            </div>
            
        </main>
    </body>
</html>
