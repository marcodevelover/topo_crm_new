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

                            <input type="text" name="dist1" class="dist1" style="widht: 60px;width: 100px;text-align: center;" /><br>
                            <input type="text" name="dist2" class="dist2" style="widht: 60px;width: 100px;text-align: center;" /><br>
                            <input type="text" name="dist3" class="dist3" style="widht: 60px;width: 100px;text-align: center;" />

                            </td>
                            <td><input type="text" class=" input1" name="xaj[]" value="{{  $report->measurements['xaj'][$cont] }}" style="text-align: center;" disabled></td>

                            <td><input type="text" class="patron" id="select_num" name="xbj[]" value="{{ $b }}" data-patron="{{ $b }}" style="text-align: center;" disabled>
                            <td>
                                <span class="disabled">
                                    <input class="residuo" type="text" value="{{ $report->measurements['dj1'][$cont] }}" style="text-align: center;" disabled>
                                </span>
                            </td>
                            <td>
                                <span class="disabled">
                                    <input class="cuadratico" name="rj1[]" type="text" value="{{ $report->measurements['rj1'][$cont] }}" style="text-align: center;" >
                                </span>
                            </td>
                            <td>

                    @endforeach

                    <tr>
                    <td>TOTAL DE PUNTOS DE MEDICION</td>
                    <td><input name="txtTotalMedicion" class="txtTotalMedicion" type="text" style="text-align: center;width: 100px;" ></td>
                    </tr>
                    <tr>
                    <td>TOTAL DE MEDICIONES POSIBLES</td>
                    <td><input name="txtMedidasPosibles" class="txtMedidasPosibles" type="text" disabled style="text-align: center;width: 100px;" ></td>
                    </tr>
                    <tr>
                    <td>TOTAL DE PUNTOS CONOCIDOS</td>
                    <td><input name="txtTotalPuntosPosibles" class="txtTotalPuntosPosibles" type="text" disabled style="text-align: center;width: 100px;" ></td>
                    </tr>
                    <tr>
                    <td>NUMERO DE GRADOS DE LIBERTAD</td>
                    <td><input name="txtNumeroGradoLibertad" class="txtNumeroGradoLibertad" type="text" disabled style="text-align: center;width: 100px;" ></td>
                    </tr>
                    <tr>
                    <td>SUMATORIA RESIDUO CUADRATICO MM</td>
                    <td><input name="txtSumatoriaResiduoCuadratico" class="txtSumatoriaResiduoCuadratico" type="text" disabled style="text-align: center;width: 100px;" ></td>
                    </tr>
                    <tr>
                    <td>Desviacion</td>
                    <td><input name="txtDesviacion" class="txtDesviacion" type="text" disabled style="text-align: center;width: 100px;" ></td>
                    </tr>

                </tbody>
            </table>




        </div>

     <!-- <input type="button" class="btnSubmit btn-lg my-4 btn-primary font-weight-bold" value="Aceptar" /> -->


    </div>
</div>

 <div class="col-sm-12 col-lg-12">
    <button type="submit" class="btn btn-lg my-4 btn-primary font-weight-bold">Guardar</button>
</div>