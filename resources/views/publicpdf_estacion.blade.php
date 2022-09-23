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

            .table-sm{
                line-height: 1; 
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

        <?php
            $index1 = 1;
            $index2 = 21;
            $cont = 0;
        ?>


    </head>
    <body>
        <div class="logo"></div>
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
                    <td class="text-center">
                        <img src="https://certificaciones.toposervis.com.mx/assets/images/Toposervis-Logo.png" width="120">
                    </td>
                    <td class="text-center">
                        <p style="font-size:22px;font-weight:bold;line-height:28px;">TOPOSERVIS S DE RL DE CV CONSTANCIA DE CALIBRACIÓN</p>
                        <strong>{{$report->folio}}</strong>
                    </td>
                    <td class="text-center">
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






         <div style="page-break-after:always;"></div>





        <main>

            <table class="table table-sm" style="border:0px;">
                <tr class="bg-topo">
                    <th colspan="2">Reporte de medición - Pruebas de distanciometro usando prisma</th>
                </tr>
                <tr>
                    <td style="border:0px;">Fecha: {{$prisma->date}}</td>
                    <td style="border:0px;">Temperatura: {{ $prisma->temperature }}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Producto: {{$equipment['equipment']}}</td>
                    <td style="border:0px;">Presión: {{$prisma->pressure}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">No serial: {{$equipment['no_serie']}}</td>
                    <td style="border:0px;">Húmedad: {{$prisma->humidity}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Obvservador:</td>
                    <td style="border:0px;">{{ $prisma->observer}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Hora: {{ date('H:i:s', strtotime($prisma->date)) }}</td>
                </tr>
            </table>

        </main>

        <br>

        <main>

           <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th style="text-align: center">Distancia(m)</th>
                        <th style="text-align: center">Promedio(m)</th>
                        <th style="text-align: center">Patron(m)</th>
                        <th style="text-align: center">Residuo(mm)</th>
                        <th style="text-align: center">Residuo cuadratico</th>
                    </tr>
                </thead>
                <tbody id="reportMedicion">
                @php

                @endphp

                <tr>
                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['dist1'][0],6)  }}<br>
                {{ number_format($prisma->arrMedicion['dist2'][0],6) }}<br>
                {{ number_format($prisma->arrMedicion['dist3'][0],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['promedio_prisma'][0],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['patron'][0],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['residuo'][0],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['residuocuadratico'][0],6) }}</div></td>
                </tr>





                <tr>
                <td>
                  <div style="text-align: right">{{ number_format($prisma->arrMedicion['dist1'][1],6) }}<br>
                  {{ number_format($prisma->arrMedicion['dist2'][1],6) }}<br>
                  {{ number_format($prisma->arrMedicion['dist3'][1],6) }}</div>
                </td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['promedio_prisma'][1],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['patron'][1],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['residuo'][1],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['residuocuadratico'][1],6) }}</div></td>
                </tr>





                <tr>
                <td>
                  <div style="text-align: right">{{ number_format($prisma->arrMedicion['dist1'][2],6) }}<br>
                  {{ number_format($prisma->arrMedicion['dist2'][2],6) }}<br>
                  {{ number_format($prisma->arrMedicion['dist3'][2],6) }}</div>
                </td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['promedio_prisma'][2],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['patron'][2],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['residuo'][2],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['residuocuadratico'][2],6) }}</div></td>
                </tr>







                <tr>
                <td>
                  <div style="text-align: right">{{ number_format($prisma->arrMedicion['dist1'][3],6) }}<br>
                  {{ number_format($prisma->arrMedicion['dist2'][3],6) }}<br>
                  {{ number_format($prisma->arrMedicion['dist3'][3],6) }}</div>
                </td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['promedio_prisma'][3],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['patron'][3],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['residuo'][3],6) }}</div></td>

                <td><div style="text-align: right">{{ number_format($prisma->arrMedicion['residuocuadratico'][3],6) }}</div></td>
                </tr>


                </tbody>

                <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="text-align: right">Desviacion = {{ $prisma->arrMedicion['txtDesviacion'] }}</td>
                  <td></td>
                  <td></td>
                </tr>
                </tfoot>
            </table>

            <div class="text-center">
                <p>Observaciones</p>
                {{ $prisma->observation}}
            </div>








               <div style="page-break-after:always;"></div>









            <main>
            <table class="table table-sm" style="border:0px;">
                <tr class="bg-topo">
                    <th colspan="2">Reporte de medición - Angulos Horizontales</th>
                </tr>
                <tr>
                    <td style="border:0px;">Fecha: {{$angulos_h->date}}</td>
                    <td style="border:0px;">Temperatura: {{ $angulos_h->temperature }}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Producto: {{$equipment['equipment']}}</td>
                    <td style="border:0px;">Presión: {{$angulos_h->pressure}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">No serial: {{$equipment['no_serie']}}</td>
                    <td style="border:0px;">Húmedad: {{$angulos_h->humidity}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Obvservador:</td>
                    <td style="border:0px;">{{ $angulos_h->observer}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Hora: {{ date('H:i:s', strtotime($angulos_h->date)) }}</td>
                </tr>
            </table>
        </main>

        <br>

        <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th style="text-align: center">j</th>
                        <th style="text-align: center">k</th>
                        <th style="text-align: center">Cara 1</th>
                        <th style="text-align: center">Cara 2</th>
                        <th style="text-align: center">sum c1 y c2</th>
                        <th style="text-align: center">Promedio</th>

                    </tr>
                </thead>
                <tbody id="reportMedicion">
                @php

                @endphp

                <tr>
                  <td><div style="text-align: right">1</div></td>

                  <td><div style="text-align: right">1<br>2<br>3<br>4</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['cara1'][0]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][0]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][0]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][0]['_4'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][0]['_totalcara1'],6) }}</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['cara2'][0]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][0]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][0]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][0]['_4'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][0]['_totalcara2'],6) }}</div></td>

                   <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['sumacara'][0]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['sumacara'][0]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['sumacara'][0]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['sumacara'][0]['_4'],6) }}</div></td>

                   <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['promedio'][0]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][0]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][0]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][0]['_4'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][0]['_totalpromedio'],6) }}</div></td>
                </tr>





               <tr>
                  <td><div style="text-align: right">1</div></td>

                  <td><div style="text-align: right">1<br>2<br>3<br>4</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['cara1'][1]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][1]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][1]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][1]['_4'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][1]['_totalcara1'],6) }}</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['cara2'][1]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][1]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][1]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][1]['_4'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][1]['_totalcara2'],6) }}</div></td>

                   <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['sumacara'][1]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['sumacara'][1]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['sumacara'][1]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['sumacara'][1]['_4'],6) }}</div></td>

                   <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['promedio'][1]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][1]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][1]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][1]['_4'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][1]['_totalpromedio'],6) }}</div></td>
                </tr>





                <tr>
                  <td><div style="text-align: right">1</div></td>

                  <td><div style="text-align: right">1<br>2<br>3<br>4</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['cara1'][2]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][2]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][2]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][2]['_4'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara1'][2]['_totalcara1'],6) }}</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['cara2'][2]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][2]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][2]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][2]['_4'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['cara2'][2]['_totalcara2'],6) }}</div></td>

                   <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['sumacara'][2]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['sumacara'][2]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['sumacara'][2]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['sumacara'][2]['_4'],6) }}</div></td>

                   <td><div style="text-align: right"> {{ number_format($angulos_h->arrMedicion['promedio'][2]['_1'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][2]['_2'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][2]['_3'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][2]['_4'],6) }}<br>
                  {{ number_format($angulos_h->arrMedicion['promedio'][2]['_totalpromedio'],6) }}</div></td>
                </tr>


                </tbody>

                <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style="text-align: right">s = {{ $angulos_h->arrMedicion['paraserie'] }}</td>
                  <td></td>
                </tr>
                </tfoot>

            </table>

            <div class="text-center">
                <p>Observaciones</p>
                {{ $angulos_h->observation}}
            </div>







            <div style="page-break-after:always;"></div>






           <main>

            <table class="table table-sm" style="border:0px;">
                <tr class="bg-topo">
                    <th colspan="2">Reporte de medición - Angulos Verticales</th>
                </tr>
                <tr>
                    <td style="border:0px;">Fecha: {{$angulos_v->date}}</td>
                    <td style="border:0px;">Temperatura: {{ $angulos_v->temperature }}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Producto: {{$equipment['equipment']}}</td>
                    <td style="border:0px;">Presión: {{$angulos_v->pressure}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">No serial: {{$equipment['no_serie']}}</td>
                    <td style="border:0px;">Húmedad: {{$angulos_v->humidity}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Obvservador:</td>
                    <td style="border:0px;">{{ $angulos_v->observer}}</td>
                </tr>
                <tr>
                    <td style="border:0px;">Hora: {{ date('H:i:s', strtotime($angulos_v->date)) }}</td>
                </tr>
            </table>

        </main>

         <br>

        <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th style="text-align: center">j</th>
                        <th style="text-align: center">k</th>
                        <th style="text-align: center">Xj,k1</th>
                        <th style="text-align: center">Xj,k2</th>

                    </tr>
                </thead>
                <tbody id="reportMedicion">
                @php

                @endphp

                <tr>
                  <td><div style="text-align: right">1</div></td>

                  <td><div style="text-align: right">1<br>2<br>3<br>4</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_v->arrMedicion['Xj1'][0]['_1'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][0]['_2'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][0]['_3'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][0]['_4'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][0]['_total'],6) }}</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_v->arrMedicion['Xj2'][0]['_1'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][0]['_2'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][0]['_3'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][0]['_4'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][0]['_total'],6) }}</div></td>

                </tr>





              <tr>
                  <td><div style="text-align: right">1</div></td>

                  <td><div style="text-align: right">1<br>2<br>3<br>4</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_v->arrMedicion['Xj1'][1]['_1'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][1]['_2'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][1]['_3'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][1]['_4'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][1]['_total'],6) }}</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_v->arrMedicion['Xj2'][1]['_1'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][1]['_2'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][1]['_3'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][1]['_4'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][1]['_total'],6) }}</div></td>

                </tr>





               <tr>
                  <td><div style="text-align: right">1</div></td>

                  <td><div style="text-align: right">1<br>2<br>3<br>4</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_v->arrMedicion['Xj1'][2]['_1'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][2]['_2'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][2]['_3'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][2]['_4'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj1'][2]['_total'],6) }}</div></td>

                  <td><div style="text-align: right"> {{ number_format($angulos_v->arrMedicion['Xj2'][2]['_1'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][2]['_2'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][2]['_3'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][2]['_4'],6) }}<br>
                  {{ number_format($angulos_v->arrMedicion['Xj2'][2]['_total'],6) }}</div></td>

                </tr>


                </tbody>

                <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="text-align: right">s = {{ $angulos_v->arrMedicion['raizsumatoria'] }}</td>
                  <td></td>
                </tr>
                </tfoot>

            </table>

            <div class="text-center">
                <p>Observaciones</p>
                {{ $angulos_v->observation}}
            </div>










          <div style="page-break-after:always;"></div>


            <div class="text-center">
                <p>Configuración para la calibración</p>
                <img src="{{ asset('/images/reporte-medicion.png') }}" class="img-fluid">
            </div>
            <table class="table table-sm text-center" style="border:0px;margin:1cm 0cm;">
                <tr>
                    <td style="border:0px;">
                        <img src="{{ Storage::url($user1->signed)}}" width="150">
                    </td>
                    <td style="border:0px;">
                        <img src="{{ Storage::url($report->user->signed)}}" width="150">
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
