<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>No. CT-{{ $report->folio }}</title>
        <style>
            @page {
                margin: 0cm 0cm;
            }
            body {
                position: relative;
                margin-top: 1cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
                font-size:14px;
            }
            .logo{
                background-image: url('https://certificaciones.toposervis.com.mx/assets/images/ToposervisLogo.png');
                position:fixed;
                top:0;
                left:0;
                opacity:0.04;
                width:100%;
                height:100%;
            }
            /** Definir las reglas del pie de página **/
            footer {
                font-size:12px;
                position: fixed; 
                bottom: 1cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
                padding:0cm 2cm 1cm 2cm;
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
        </style>
    </head>
    <body>
        <div class="logo"></div>
        <?php 
            $link = URL::to('/');
            $index1 = 1; $index2 = 21; $cont = 0; $djsum1 = 0; $_djsum1 = 0; 
            $_djsum12 = 0; $total_xaj2 = 0; $total_xbj2 = 0; $djsum2 = 0; $_djsum2 = 0;
            $total_xaj = 0; $total_xbj = 0; $r2jsum1 = 0; $r2jsum2 = 0;
            $cuadrado1 = 0; $cuadrado2 = 0; $sisolev = 0;

            foreach($report->measurements['xaj'] as $mp):

                $djsum1 = $djsum1 + ( $report->measurements['dj1'][$cont] );
                $djsum2 = $djsum2 + $report->measurements['dj2'][$cont];

                $r2jsum1 = $r2jsum1 + $report->measurements['r2j1'][$cont];
                $r2jsum2 = $r2jsum2 + $report->measurements['r2j2'][$cont];
                
                $total_xaj = $total_xaj + $mp;
                $total_xbj = $total_xbj + $report->measurements['xbj'][$cont];
                $total_xaj2 = $total_xaj2 + $report->measurements['xaj2'][$cont];
                $total_xbj2 = $total_xbj2 + $report->measurements['xbj2'][$cont];

                $cont++;
            endforeach;
            $_djsum1 = $djsum1 / 20;
            $_djsum2 = $djsum2 / 20;
        ?>

        <footer>
            <table class="table table-sm">
                <tr style="padding:1px 0px;">
                    <td style="border:0px;padding:0px;text-align:left;">Toposervis S.A de C.V <br>C. 42 #264 por 41A y 41 <br>Col. Francisco de Montejo III,<br> Mérida, Yucatán, México</td>
                    <td style="border:0px;padding:0px;text-align:right;">
                        Certificado <strong>No {{$report->folio}}</strong><br>
                        Queda prohibida la reproducción <br>total o parcial
                    </td>
                </tr>
                <tr style="padding:1px 0px;">
                    <td style="border:0px;padding:0px;text-align:left;">www.toposervi.com</td>
                    <td style="border:0px;padding:0px;text-align:right;"></td>
                </tr>
                <tr style="padding:1px 0px;">
                    <td style="border:0px;padding:0px;text-align:left;">(999) 429 8278</td>
                    <td style="border:0px;padding:0px;text-align:right;"></td>
                </tr>
            </table>
        </footer>
        
        <main>
            <table>
                <tr>
                    <td>
                        <img src="https://certificaciones.toposervis.com.mx/assets/images/Toposervis-Logo.png" width="120">
                    </td>
                    <td class="text-center">
                        <p style="font-size:22px;font-weight:bold;line-height:28px;">TOPOSERVIS S DE RL DE CV CERTIFICADO DE CALIBRACIÓN</p>
                        <strong>{{$report->folio}}</strong>
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
                    <td style="border:0px;">Descripcion</td><td style="border:0px;">{{$pattern->description}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Marca: {{$pattern->brand}}</td><td style="border:0px;">Modelo: {{$pattern->model}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">No. serie: {{$pattern->no_serie}}</td><td style="border:0px;">Certificado: {{$pattern->equipment}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Calibro</td><td style="border:0px;">Calibro</td>
                </tr>
                <tr>
                    <td style="border:0px;">Descripción</td><td style="border:0px;">Descripción</td>
                </tr>
            </table>
        </main>
        <main>
            <div style="page-break-after:always;"></div>
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
                            
                            <?php  $cuadrado1 = $cuadrado1 + $report->measurements['rj1'][$count]; ?>
                            <td> <span class="rj1">{{ $report->measurements['rj1'][$count] }}</span> </td>
                            
                            <td class="r2j1"> {{ $report->measurements['r2j1'][$count] }} </td>
                            <td> {{ $index2++ }} </td>
                            <td> {{ $report->measurements['xaj2'][$count] }} </td>
                            <td> {{ $report->measurements['xbj2'][$count] }} </td>
                            <td class="dj2">{{ $report->measurements['xaj2'][$count] - $report->measurements['xbj2'][$count] }}</td>
                            <td class="rj2">{{ $report->measurements['rj2'][$count] }}</td>
                            <td class="r2j2">{{ $report->measurements['r2j2'][$count] }}</td>
                        </tr>
                        <?php $count ++; ?>
                    @endforeach
                    <tr>
                        <td></td>
                        <td>{{ $total_xaj }}</td>
                        <td>{{ $total_xbj }}</td>
                        <td><span id="total1">{{$djsum1}}</span></td>
                        <td></td>
                        <td><span id="sumcuadrado1">{{  $r2jsum1 }}</span></td>
                        <td></td>
                        <td>{{ $total_xaj2 }}</td>
                        <td>{{ $total_xbj2 }}</td>
                        <td><span id="total2">{{$djsum2}}</span></td>
                        <td></td>
                        <td><span id="sumcuadrado2">{{$r2jsum2}}</span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>d1=</td>
                        <td> <span id="promedio1">{{ $_djsum1 }}</span> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>d2=</td>
                        <td> <span id="promedio2">{{ $_djsum2 }}</span></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <?php 
                            $erj2 = $r2jsum1 + $r2jsum2;
                            $s = sqrt( ($erj2 / 38) );
                            $s = round($s, 2);
                            $sisolev = $s * 2.89;
                            $sisolev = round($sisolev, 2);
                        ?>
                        <td>Erj2= <span id="sumatoriarj2">{{ $erj2 }}</span></td>
                        <td  style="text-align:center">s = {{ $s }} </td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right"><strong>sisolev =</strong></td>
                        <td>{{ $sisolev }}
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> 
                </tfoot>
            </table>
            <div style="margin-top:1cm;" class="text-center">
                <p>Especificaciones del instrumento:</p>
            </div>
            <div class="text-center">
                <p>Precisión (desviación estándar para la nivelación de doble recorrido en 1 km): 0,7 mm</p>
            </div>
            <div class="text-center">
                <p>Configuración para la calibración</p>
                <img src="{{ asset('/images/reporte-medicion.png') }}" class="img-fluid">
            </div>
            <div class="text-center">
                <p>Observaciones</p>
                {{ $report->observation}}
            </div>
            <table class="table table-sm text-center" style="border:0px;margin:1cm 0cm;">
                <tr>
                    <td style="border:0px;">
                        <img src="{{$link}}{{ Storage::url($user1->signed)}}" width="150">
                    </td>
                    <td style="border:0px;">
                        <img src="{{$link}}{{ Storage::url($report->user->signed)}}" width="150">
                    </td>
                </tr>
                <tr>
                    <td style="border:0px;">
                        {{ $user1->name }} <br>
                        {{ $user1->job }} 
                    </td>
                    <td style="border:0px;">
                        {{ $report->user->name }} <br>
                        {{ $report->user->job }} 
                    </td>
                </tr>
            </table>
            <table class="table table-sm text-center" style="border:0px;margin-top:1cm;">
                <tr>
                    <td colspan="2" style="text-align:center;border:0px;">
                        <img src="{{URL::to('/')}}{{ Storage::url('qrcodes/'.$report->folio.'.png') }}" width="180"><br>
                        <small>Certificado <strong>No {{$report->folio}}</strong></small>
                    </td>
                </tr>
            </table>
        </main>
    </body>
</html>
