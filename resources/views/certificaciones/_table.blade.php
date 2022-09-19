<style>
    td input.form-control{
        width:60px;
    }

    .input1{
      text-align: center;
      background: #d5d5d5;
       margin:4px;
      border:none;
    }

    .inputdist{
      margin:2px;
    }

    .patron{
      text-align: center;
    }

    .residuo{
      text-align: center;
      background: #d5d5d5;
      border:none;
    }

     .cuadratico{
      text-align: center;
      background: #d5d5d5;
      border:none;
    }

    .dis{
      text-align: center;
      background: #d5d5d5;
      border:none;
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
                    ?>

                    @foreach($report->angulosprisma['patron'] as $patron)

                        <tr id="row-{{ $index1 }}">

                            <td>

                            <input type="text" name="dist1[]" class="inputdist dist1" value="{{ $aux['dist1'][$loop->index] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" /><br>
                            <input type="text" name="dist2[]" class="inputdist dist2" value="{{ $aux['dist2'][$loop->index] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" /><br>
                            <input type="text" name="dist3[]" class="inputdist dist3" value="{{ $aux['dist3'][$loop->index] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" />

                            </td>
                            <td><input type="text"  class=" input1 input_promedio" name="promedio_prisma[]" value="{{ $aux['promedio_prisma'][$loop->index] ?? "" }}" readonly></td>

                            <td><input type="text" class="patron input_patron" id="select_num" name="patron[]" value="{{ $aux['patron'][$loop->index] ?? "" }}" data-patron="{{ $patron }}" >
                            <td>
                                <span class="disabled">
                                    <input class="residuo input_residuo" type="text" name="residuo[]"  value="{{ $aux['residuo'][$loop->index] ?? "" }}" readonly>
                                </span>
                            </td>
                            <td>
                                <span class="disabled">
                                    <input type="text" class="cuadratico input_cuadratico" name="residuocuadratico[]" value="{{ $aux['residuocuadratico'][$loop->index] ?? "" }}"  readonly >
                                </span>
                            </td>
                            <td>

                    @endforeach

                    <tr>
                    <td>TOTAL DE PUNTOS DE MEDICION123</td>
                    <td><input name="txtTotalMedicion" class="txtTotalMedicion" value="{{ $aux['txtTotalMedicion'] ?? "" }}" type="text" style="text-align: center;width: 100px;" ></td>
                    </tr>
                    <tr>
                    <td>TOTAL DE MEDICIONES POSIBLES</td>
                    <td><input name="txtMedidasPosibles" class="dis txtMedidasPosibles" value="{{ $aux['txtMedidasPosibles'] ?? "" }}" type="text" readonly style="text-align: center;width: 100px;" ></td>
                    </tr>
                    <tr>
                    <td>TOTAL DE PUNTOS CONOCIDOS</td>
                    <td><input name="txtTotalPuntosPosibles" class="dis txtTotalPuntosPosibles" value="{{ $aux['txtTotalPuntosPosibles'] ?? "" }}" type="text" readonly style="text-align: center;width: 100px;" ></td>
                    </tr>
                    <tr>
                    <td>NUMERO DE GRADOS DE LIBERTAD</td>
                    <td><input name="txtNumeroGradoLibertad" class="dis txtNumeroGradoLibertad" value="{{ $aux['txtNumeroGradoLibertad'] ?? "" }}" type="text" readonly style="text-align: center;width: 100px;" ></td>
                    </tr>
                    <tr>
                    <td>SUMATORIA RESIDUO CUADRATICO MM</td>
                    <td><input name="txtSumatoriaResiduoCuadratico" class="dis txtSumatoriaResiduoCuadratico" value="{{ $aux['txtSumatoriaResiduoCuadratico'] ?? "" }}" type="text" readonly style="text-align: center;width: 100px;" ></td>
                    </tr>
                    <tr>
                    <td>Desviacion</td>
                    <td><input name="txtDesviacion" class="dis txtDesviacion" value="{{ $aux['txtDesviacion'] ?? "" }}" type="text" readonly style="text-align: center;width: 100px;" ></td>
                    </tr>

                </tbody>
            </table>




        </div>

     <!-- <input type="button" class="btnSubmit btn-lg my-4 btn-primary font-weight-bold" value="Aceptar" /> -->


    </div>
</div>

