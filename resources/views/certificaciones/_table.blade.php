<style>
    td input.form-control{
        width:60px;
    }
</style>
<div class="card my-2">
    <div class="card-header">
        <h5 class="my-1">Reporte de medición (Pruebas de distanciometro usando prisma)</h5>
    </div>
    <div class="card-body">
        <?php 
            $index1 = 1; 
            $index2 = 21; 
            $cont = 0; 
            $djsum1 = 0; 
            $_djsum1 = 0; 
            $_djsum12 = 0; 
            $total_xaj2 = 0; 
            $total_xbj2 = 0; 
            $djsum2 = 0; 
            $_djsum2 = 0;
            $total_xaj = 0; 
            $total_xbj = 0;
            $cuadrado1 = 0; 
            $cuadrado2 = 0;
        ?>
        <?php 
            foreach($report->measurements['xaj'] as $mp):
                $_djsum1 = $_djsum1 + $report->measurements['dj1'][$cont];
                $total_xaj = $total_xaj + $mp;
                $total_xbj = $total_xbj + $report->measurements['xbj'][$cont];

                $_djsum2 = $_djsum2 + $report->measurements['dj2'][$cont];
                $total_xaj2 = $total_xaj2 + $report->measurements['xaj2'][$cont];
                $total_xbj2 = $total_xbj2 + $report->measurements['xbj2'][$cont];

                $cont++;
            endforeach;
            $_djsum1 = $_djsum1 / 20;
            $_djsum2 = $_djsum2 / 20;
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Distancia(m)</th>
                        <th>Promedio(m)</th>
                        <th>Patron(m)</th>
                        <th>Residuo(mm)</th>
                        <th>Residuo cuadratico</th>
                        
                    </tr>
                </thead>
                <tbody id="reportMedicion" class="text-center">
                    <?php
                    $cont = 0;
                    $dj1Round = 0;
                    $dj2Round = 0;
                    ?>

                    @foreach($report->measurements['xbj'] as $b)
                        <?php

                            $djsum1 = $djsum1 + $report->measurements['dj1'][$cont];
                            $djsum2 = $djsum2 + $report->measurements['dj2'][$cont];
                        ?>
                        <tr id="row-{{ $index1 }}">
                            <td>

                            <input type="text" name="dist1" class="dist1" placeholder="distancia 1" /><br><br>
                            <input type="text" name="dist2" class="dist2" placeholder="distancia 2"/><br><br>
                            <input type="text" name="dist3" class="dist3" placeholder="distancia 3"/>

                            </td>
                            <td><input type="text" class=" input1" name="xaj[]" value="{{  $report->measurements['xaj'][$cont] }}" disabled></td>

                            <td><input type="text" class="patron" id="select_num" name="xbj[]" value="{{ $b }}" data-patron="{{ $b }}" disabled>
                            <td>
                                <span class="disabled">
                                    <input class="residuo" type="text" value="{{ $report->measurements['dj1'][$cont] }}" disabled>
                                </span>
                            </td>
                            <td>
                                <span class="disabled">
                                    <input class="cuadratico" name="rj1[]" type="text" value="{{ $report->measurements['rj1'][$cont] }}">
                                </span>
                            </td>
                            <td>

                    @endforeach




                    <tr>
                        <td></td>
                        <td>{{ $total_xaj }}</td>
                        <td>{{ $total_xbj }}</td>
                        <td><span id="total1">{{$djsum1}}</span></td>
                        <td></td>
                        <td><span id="sumcuadrado1">{{$cuadrado1}}</span></td>
                        <td></td>
                        <td>{{ $total_xaj2 }}</td>
                        <td>{{ $total_xbj2 }}</td>
                        <td><span id="total2">{{$djsum2}}</span></td>
                        <td></td>
                        <td><span id="sumcuadrado2">{{$cuadrado2}}</span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>d1=</td>
                        <td> <span id="promedio1">{{ $djsum1 / 20 }}</span> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>d2=</td>
                        <td> <span id="promedio2">{{ $djsum2 / 20 }}</span></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Σrj2= <span id="sumatoriarj2">{{ $cuadrado1 + $cuadrado2 }}</span></td>
                        <?php 
                            $raiz = $cuadrado1 + $cuadrado2;
                            $raiz = $raiz / 38;
                            $raiz = sqrt( $raiz ); 
                            $raiz = round($raiz, 2);
                            $sisolev = $raiz * 2.89;
                        ?>
                        <td>s = <span id="ese">{{ $raiz }}</span></td>
                        <td></td>
                        <td></td>
                        <td>sisolev=</td>
                        <td> <span id="sisolev">{{ $sisolev }}</span></td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>




<!-- <div class="col-sm-12 col-lg-12">
    <button type="submit" class="btn btn-lg my-4 btn-primary font-weight-bold">Guardar</button>
</div> -->