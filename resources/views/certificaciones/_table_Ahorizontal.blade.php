<style>
    td input.form-control{
        width:60px;
    }
</style>
<div class="card my-2">
    <div class="card-header">
        <h5 class="my-1">Reporte de medición (Angulos Horizontales)</h5>
    </div>
    <div class="card-body">
        <?php
            $index1 = 1;
            $index2 = 21;
            $cont = 0;
        ?>

<!--<form id="frmMedicion">
-->
      <div class="table-responsive" id="data">
          <table class="table table-striped">
              <thead class="text-center">
                  <tr>
                      <th>j</th>
                      <th>k</th>
                      <th>cara1</th>
                      <th>cara2</th>
                      <th>suma c1 y c2</th>
                      <th>promedio</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>r</th>
                      <th>r2</th>

                  </tr>
              </thead>
              <tbody id="reportAngulosHorizontales" class="text-center">
                  <?php
                  $cont = 0;
                  $iAux = 0;

                  ?>

                  @foreach($report->angulosHorizontales['i'] as $m)



                      <tr id="row{{ $index1 }}" class="roww">


                          <td>

                          {{ $index1++ }}

                          </td>

                          <!-- k -->
                          <td >
                            @for($i = 0; $i < 5; ++$i)
                            <input type="text" class="input_{{ $i }}" name="k[]" value="{{ $report->angulosHorizontales['k'][$i] }}" style="text-align:center;width: 50px; " disabled ><br>
                            @endfor
                          </td>

                          <!-- cara1 -->
                           <td>
                            <input type="text" class="cara1 cara1_1" name="cara1[{{ $loop->index }}][_1]" value="{{ $angulos_h['cara1'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" /><br>
                            <input type="text" class="cara1 cara1_2" name="cara1[{{ $loop->index }}][_2]" value="{{ $angulos_h['cara1'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" /><br>
                            <input type="text" class="cara1 cara1_3" name="cara1[{{ $loop->index }}][_3]" value="{{ $angulos_h['cara1'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" /><br>
                            <input type="text" class="cara1 cara1_4" name="cara1[{{ $loop->index }}][_4]" value="{{ $angulos_h['cara1'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" /><br>
                            <input type="text" class="total_cara1"   name="cara1[{{ $loop->index }}][_totalcara1]" value="{{ $angulos_h['cara1'][$loop->index]['_totalcara1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla ="1" readonly /><br>
                          </td>

                          <!-- cara2 -->
                          <td>
                          <span class="disabled">
                          <input type="text" class="cara2 cara2_1"  name="cara2[{{ $loop->index }}][_1]" value="{{ $angulos_h['cara2'][$loop->index]['_1'] ?? "" }}"  style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" /><br>
                          <input type="text" class="cara2 cara2_2"  name="cara2[{{ $loop->index }}][_2]" value="{{ $angulos_h['cara2'][$loop->index]['_2'] ?? "" }}"  style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" /><br>
                          <input type="text" class="cara2 cara2_3"  name="cara2[{{ $loop->index }}][_3]" value="{{ $angulos_h['cara2'][$loop->index]['_3'] ?? "" }}"  style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" /><br>
                          <input type="text" class="cara2 cara2_4"  name="cara2[{{ $loop->index }}][_4]" value="{{ $angulos_h['cara2'][$loop->index]['_4'] ?? "" }}"  style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" /><br>
                          <input type="text" class="total_cara2"    name="cara2[{{ $loop->index }}][_totalcara2]" value="{{ $angulos_h['cara2'][$loop->index]['_totalcara2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" readonly /><br>
                          </span>
                          </td>

                          <!-- suma_c1_c2 -->
                          <td>
                              <span class="disabled">
                              <input type="text" class="suma_c1_c2_1" name="sumacara[{{ $loop->index }}][_1]" value="{{ $angulos_h['sumacara'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                              <input type="text" class="suma_c1_c2_2" name="sumacara[{{ $loop->index }}][_2]" value="{{ $angulos_h['sumacara'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                              <input type="text" class="suma_c1_c2_3" name="sumacara[{{ $loop->index }}][_3]" value="{{ $angulos_h['sumacara'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                              <input type="text" class="suma_c1_c2_4" name="sumacara[{{ $loop->index }}][_4]" value="{{ $angulos_h['sumacara'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" readonly /><br>
                              <input type="text" style="widht: 60px;width: 100px;text-align: center;background-color:transparent;border:none;"  disabled />
                              </span>
                          </td>

                            <!-- promedio -->

                          <td>
                              <span class="disabled">
                              <input type="text" class="promedio prom_1" name="promedio[{{ $loop->index }}][_1]" value="{{ $angulos_h['promedio'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                              <input type="text" class="promedio prom_2" name="promedio[{{ $loop->index }}][_2]" value="{{ $angulos_h['promedio'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                              <input type="text" class="promedio prom_3" name="promedio[{{ $loop->index }}][_3]" value="{{ $angulos_h['promedio'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                              <input type="text" class="promedio prom_4" name="promedio[{{ $loop->index }}][_4]" value="{{ $angulos_h['promedio'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" readonly /><br>
                              <input type="text" class="totalpromedio"  name="promedio[{{ $loop->index }}][_totalpromedio]" value="{{ $angulos_h['promedio'][$loop->index]['_totalpromedio'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;"   readonly/><br>
                              </span>
                          </td>

                           <!-- suma de los promedios =400-F2+F3, =400-F2+F4 ... -->

                         <td>
                              <span class="disabled">
                              <input type="text" class="sumaprom sumaprom_1" name="sumapromedio[{{ $loop->index }}][_1]" value="{{ $angulos_h['sumapromedio'][$loop->index]['_1'] ?? $report->angulosHorizontales['sumaprom'][$cont] }}" style="widht: 60px;width: 100px;text-align: center;"  readonly /><br>
                              <input type="text" class="sumaprom sumaprom_2" name="sumapromedio[{{ $loop->index }}][_2]" value="{{ $angulos_h['sumapromedio'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                              <input type="text" class="sumaprom sumaprom_3" name="sumapromedio[{{ $loop->index }}][_3]" value="{{ $angulos_h['sumapromedio'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                              <input type="text" class="sumaprom sumaprom_4" name="sumapromedio[{{ $loop->index }}][_4]" value="{{ $angulos_h['sumapromedio'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                              <input type="text" class="sumaprom totalsumaprom" name="sumapromedio[{{ $loop->index }}][_totalsumaprom]" value="{{ $angulos_h['sumapromedio'][$loop->index]['_totalsumaprom'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                              </span>
                          </td>

                           <!-- promedio de las sumas =PROMEDIO(G3,G9,G15)... -->

                            <td>
                              <span class="disabled">
                              <input type="text" style="widht: 60px;width: 100px;text-align: center;" name="promediosuma[{{ $loop->index }}][_1]" value="{{ $angulos_h['promediosuma'][$loop->index]['_1'] ?? $report->angulosHorizontales['promsuma'][$cont] }}" readonly /><br>
                              <input type="text" class="promsuma promsuma_1" name="promediosuma[{{ $loop->index }}][_2]" value="{{ $angulos_h['promediosuma'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" readonly /><br>
                              <input type="text" class="promsuma promsuma_2" name="promediosuma[{{ $loop->index }}][_3]" value="{{ $angulos_h['promediosuma'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" readonly /><br>
                              <input type="text" class="promsuma promsuma_3" name="promediosuma[{{ $loop->index }}][_4]" value="{{ $angulos_h['promediosuma'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" readonly /><br>
                              <input type="text" class="promsuma promsuma_4" name="promediosuma[{{ $loop->index }}][_5]" value="{{ $angulos_h['promediosuma'][$loop->index]['_5'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" readonly /><br>
                              </span>
                          </td>

                           <!-- restas de promedio =H3-G3, =H4-G4 ... -->

                             <td>
                              <span class="disabled">
                              <input type="text" class="restaprom restaprom_1" name="restapromedio[{{ $loop->index }}][_1]" value="{{ $angulos_h['restapromedio'][$loop->index]['_1'] ?? $report->angulosHorizontales['restaprom'][$cont]  }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                              <input type="text" class="restaprom restaprom_2" name="restapromedio[{{ $loop->index }}][_2]" value="{{ $angulos_h['restapromedio'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                              <input type="text" class="restaprom restaprom_3" name="restapromedio[{{ $loop->index }}][_3]" value="{{ $angulos_h['restapromedio'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                              <input type="text" class="restaprom restaprom_4" name="restapromedio[{{ $loop->index }}][_4]" value="{{ $angulos_h['restapromedio'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" readonly /><br>
                              <input type="text" class="restaprom restaprom_5" name="restapromedio[{{ $loop->index }}][_totalrestaprom]" value="{{ $angulos_h['restapromedio'][$loop->index]['_totalrestaprom'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="5" readonly /><br>
                              </span>
                          </td>

                           <!-- promedio restaprom =PROMEDIO(I2:I5), =PROMEDIO(I8:I11) ... -->

                          <td>
                              <span class="disabled">
                             <input type="text" class="promresta promresta_1" name="promedioresta[{{ $loop->index }}][_1]" value="{{ $angulos_h['promedioresta'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                              </span>
                          </td>


                          <!-- r -->

                           <td>
                              <span class="disabled">
                              <input type="text" class="r r_1" name="r[{{ $loop->index }}][_1]" value="{{ $angulos_h['r'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                              <input type="text" class="r r_2" name="r[{{ $loop->index }}][_2]" value="{{ $angulos_h['r'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                              <input type="text" class="r r_3" name="r[{{ $loop->index }}][_3]" value="{{ $angulos_h['r'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                              <input type="text" class="r r_4" name="r[{{ $loop->index }}][_4]" value="{{ $angulos_h['r'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" readonly /><br>
                              <input type="text" class="totalsuma_r" name="r[{{ $loop->index }}][_totalr]" value="{{ $angulos_h['r'][$loop->index]['_totalr'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" readonly /><br>
                              </span>
                          </td>

                           <!-- r2 -->

                          <td>
                              <span class="disabled">
                              <input type="text" class="cubo cubo_1" name="r2[{{ $loop->index }}][_1]" value="{{ $angulos_h['r2'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                              <input type="text" class="cubo cubo_2" name="r2[{{ $loop->index }}][_2]" value="{{ $angulos_h['r2'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                              <input type="text" class="cubo cubo_3" name="r2[{{ $loop->index }}][_3]" value="{{ $angulos_h['r2'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                              <input type="text" class="cubo cubo_4" name="r2[{{ $loop->index }}][_4]" value="{{ $angulos_h['r2'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" readonly /><br>
                              <input type="text" class="cubo totalcubo" name="r2[{{ $loop->index }}][_totalr2]" value="{{ $angulos_h['r2'][$loop->index]['_totalr2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                              </span>
                          </td>

                          </tr>


                  @endforeach
              </tbody>
          </table>


          <br>

          <table class="table table-striped">
            <tbody>
            <tr>
              <td>La diferencia en la apertura de angulos debe ser la misma</td>
              <td> <input type="text" class="apertura" name="apertura" value="{{ $angulos_h['apertura'] ?? "" }}" style="text-align: center;" readonly /></td>
            </tr>
            <tr>
              <td>Para 3 series de 4 medidas</td>
              <td><input type="text" class="paraserie" name="paraserie" value="{{ $angulos_h['paraserie'] ?? "" }}" style="text-align: center;" readonly /></td>
            </tr>
            </tbody>
          </table>




      </div>



<!--
<input type="button" class="btnSubmit btn-lg my-4 btn-primary font-weight-bold" value="Aceptar" />-->

<!--</form>
-->




  </div>
</div>

@push('custom-scripts')
<script type="text/javascript">
$(document).on("keyup", ".cara1, .cara2" , function(evt){

  var $cara = $(this);

  var $tr = $cara.closest("tr");
  var iAncla = $cara.data("ancla");

  var $cara1      = $tr.find(".cara1_" + iAncla);
  var $cara2      = $tr.find(".cara2_" + iAncla);
  var $suma_c1_c2 = $tr.find(".suma_c1_c2_" + iAncla);
  var $promedio   = $tr.find(".prom_" + iAncla);

  var $total_cara1   = $tr.find(".total_cara1");
  var $total_cara2   = $tr.find(".total_cara2");
  var $totalpromedio = $tr.find(".totalpromedio");

  let dCara1 = get_numeric($cara1.val(),4);
  let dCara2 = get_numeric($cara2.val(),4);
  let dTotal = 0;
  let dPromedio = 0;
  let dTotalSumatoriaCara1 = 0;
  let dTotalSumatoriaCara2 = 0;
  let dTotalSumatoriaPromedio = 0;

  if(dCara1 > 0 && dCara2 > 0)
  {
    if(dCara1 > 200)
    {
      dTotal = (dCara1 + dCara2) + 200;
    }
    else
    {
      dTotal = (dCara1 + dCara2) - 200;
    }
  }

  dTotal = number_round(dTotal, 3);

  $suma_c1_c2.val(dTotal);

  dPromedio = dTotal / 2;
  dPromedio = number_truncate(dPromedio, 4);

  $promedio.val(dPromedio)

  $tr.find( ".cara1").each(function( index ) {
    $cara1 = $(this);

    dTotalSumatoriaCara1+= get_numeric($cara1.val(), 4);
  });

  $total_cara1.val(number_round(dTotalSumatoriaCara1, 4));

  $tr.find( ".cara2").each(function( index ) {
    $cara2 = $(this);

    dTotalSumatoriaCara2+= get_numeric($cara2.val(), 4);
  });

  $total_cara2.val(number_round(dTotalSumatoriaCara2, 4));

  $tr.find(".promedio").each(function( index ) {
    $promedio = $(this);

    dTotalSumatoriaPromedio+= get_numeric($promedio.val(), 4);
  });

 $totalpromedio.val(number_truncate(dTotalSumatoriaPromedio, 4));

  // =400-F2+F3, =400-F2+F4 ...

  dTotal = 0;

  let $promedio1     = $tr.find(".promedio.prom_1").first();
  let dProm1         = get_numeric($promedio1.val(), 4);
  let dSumaProm      = 0;
  let dTotalSumaProm = 0;

  $tr.find(".promedio").each(function( index ) {
    $promedio = $(this);

    dSumaProm = 400;

    $prom     = $tr.find(".promedio.prom_" + $promedio.data("ancla"));
    $sumaprom = $tr.find(".sumaprom.sumaprom_" + $promedio.data("ancla"));
    $cara1    = $tr.find(".cara1_" + $promedio.data("ancla"));
    $cara2    = $tr.find(".cara2_" + $promedio.data("ancla"));

    dTotal = get_numeric($prom.val(), 4);

    $sumaprom.val(0);

    if($cara1.val().toString().length > 0 && $cara2.val().toString().length > 0 )
    {
      if($tr.attr("id") == "row3" && dTotal != 0)
      {
        dSumaProm = dTotal - dProm1  ;
        dSumaProm = number_round(dSumaProm, 4);

        dTotalSumaProm += dSumaProm;

        $sumaprom.val(dSumaProm);
      }
      else
      {
        if(index > 0 && index < 4)
        {
          if(dTotal != 0)
          {
            dSumaProm = dSumaProm - dProm1 + dTotal;
            dSumaProm = number_round(dSumaProm, 4);

            dTotalSumaProm += dSumaProm;

            $sumaprom.val(dSumaProm);
          }
        }
      }
    }
  });

  $tr.find(".totalsumaprom").val(number_truncate(dTotalSumaProm, 4));



// =PROMEDIO(G3,G9,G15)...

  var $sumaprom  = $tr.find(".sumaprom_" + iAncla);

  var dTotalPromSuma_ind1 = 0;
  var dTotalPromSuma_ind2 = 0;
  var dTotalPromSuma_ind3 = 0;
  var dTotalPromSuma_ind4 = 0;

  var dDivision1 = 0;
  var dDivision2 = 0;
  var dDivision3 = 0;
  var dDivision4 = 0;

  var iSumasProm2 = 0;
  var iSumasProm3 = 0;
  var iSumasProm4 = 0;
  var iSumasProm5 = 0;

  $(".roww").each(function( index ) {  // max index = 2
    $roww = $(this);

    $roww.find(".sumaprom").each(function( index ) {
      $sumaprom = $(this);

      if(index == 1)
      {
        if($sumaprom.val().toString().length > 0)
        {
          dTotalPromSuma_ind1+= get_numeric($sumaprom.val(), 4);

          iSumasProm2+=1;
        }
      }

      if(index == 2)
      {
        if($sumaprom.val().toString().length > 0)
        {
          dTotalPromSuma_ind2+= get_numeric($sumaprom.val(), 4);

          iSumasProm3+=1;
        }
      }

      if(index == 3)
      {
        if($sumaprom.val().toString().length > 0)
        {
          dTotalPromSuma_ind3+= get_numeric($sumaprom.val(), 4);

          iSumasProm4+=1;
        }
      }

      if(index == 4)
      {
        if($sumaprom.val().toString().length > 0)
        {
          dTotalPromSuma_ind4+= get_numeric($sumaprom.val(), 4);

          iSumasProm5+=1;
        }
      }

    });

  });


  $(document).find(".promsuma_1").val("");
  $(document).find(".promsuma_2").val("");
  $(document).find(".promsuma_3").val("");
  $(document).find(".promsuma_4").val("");

  $(".roww").each(function( index ) {
    $roww = $(this);

    if(iSumasProm2 >= 3)
    {
      $promsuma1 = $roww.find(".promsuma_1").first();
      dDivision1 = dTotalPromSuma_ind1 / 3;
      $promsuma1.val(number_truncate(dDivision1 , 4));
    }

    if(iSumasProm3 >= 3)
    {
      $promsuma2 = $roww.find(".promsuma_2").first();
      dDivision2 = dTotalPromSuma_ind2 / 3;
      $promsuma2.val(number_truncate(dDivision2 , 4));
    }

    if(iSumasProm4 >= 3)
    {
      $promsuma3 = $roww.find(".promsuma_3").first();
      dDivision3 = dTotalPromSuma_ind3 / 3;
      $promsuma3.val(number_truncate(dDivision3 , 4));
    }

    if(iSumasProm5 >= 3)
    {
      $promsuma4 = $roww.find(".promsuma_4").first();
      dDivision4 = dTotalPromSuma_ind4 / 3;
      $promsuma4.val(number_truncate(dDivision4 , 4));
    }
  });


    // =H3-G3, =H4-G4 ...

    var $restaprom2 = $tr.find(".restaprom_2");
    var $restaprom3 = $tr.find(".restaprom_3");
    var $restaprom4 = $tr.find(".restaprom_4");
    var $restaprom5 = $tr.find(".restaprom_5");

    let $sumaprom2 = $tr.find(".sumaprom.sumaprom_2").first();
    let $sumaprom3 = $tr.find(".sumaprom.sumaprom_3").first();
    let $sumaprom4 = $tr.find(".sumaprom.sumaprom_4").first();
    let $sumapromtotal = $tr.find(".sumaprom.totalsumaprom").first();

    let dSumaProm2  = get_numeric($sumaprom2.val(), 4);
    let dSumaProm3  = get_numeric($sumaprom3.val(), 4);
    let dSumaProm4  = get_numeric($sumaprom4.val(), 4);
    let dSumaPromTotal  = get_numeric($sumapromtotal.val(), 4);

    let dTotalProm2 = 0;
    let dTotalProm3 = 0;
    let dTotalProm4 = 0;
    let dTotalSumProm = 0;


      dTotalProm2   = dDivision1 - dSumaProm2;
      dTotalProm3   = dDivision2 - dSumaProm3;
      dTotalProm4   = dDivision3 - dSumaProm4;
      dTotalSumProm = dDivision4 - dSumaPromTotal;


      $restaprom2.val(number_round(dTotalProm2 , 4));
      $restaprom3.val(number_round(dTotalProm3 , 4));
      $restaprom4.val(number_round(dTotalProm4 , 4));
      $restaprom5.val(number_round(dTotalSumProm , 4));



    // =PROMEDIO(I2:I5), =PROMEDIO(I8:I11)

    var $restaprom   = $tr.find(".restaprom_" + iAncla);
    var $promresta  = $tr.find(".promresta_" + iAncla);
    var dTotalPromResta = 0;
    var div = 0;

    $tr.find(".restaprom").each(function( index ) {
      $restaprom = $(this);

      if(index < 4)
      {
        dTotalPromResta+= get_numeric($restaprom.val(), 4);
      }

      div = dTotalPromResta / 4;
      $promresta.val(number_truncate(div, 4));

    });





    // r

    var $r1 = $tr.find(".r_1");
    var $r2 = $tr.find(".r_2");
    var $r3 = $tr.find(".r_3");
    var $r4 = $tr.find(".r_4");

    var $restaprom1 = $tr.find(".restaprom.restaprom_1").first();
    var $restaprom2 = $tr.find(".restaprom.restaprom_2").first();
    var $restaprom3 = $tr.find(".restaprom.restaprom_3").first();
    var $restaprom4 = $tr.find(".restaprom.restaprom_4").first();

    var $promresta1 = $tr.find(".promresta.promresta_1").first();
    let dPromResta =  get_numeric($promresta1.val(), 4);

    let dRestaProm1  = get_numeric($restaprom1.val(), 4);
    let dRestaProm2  = get_numeric($restaprom2.val(), 4);
    let dRestaProm3  = get_numeric($restaprom3.val(), 4);
    let dRestaProm4  = get_numeric($restaprom4.val(), 4);

    let dResta1 = 0;
    let dResta2 = 0;
    let dResta3 = 0;
    let dResta4 = 0;

    dResta1 = dRestaProm1 - dPromResta;
    dResta2 = dRestaProm2 - dPromResta;
    dResta3 = dRestaProm3 - dPromResta;
    dResta4 = dRestaProm4 - dPromResta;


    $r1.val(number_truncate(dResta1, 4));
    $r2.val(number_round(dResta2, 4));
    $r3.val(number_round(dResta3, 4));
    $r4.val(number_round(dResta4, 4));



    var $r = $tr.find(".r_" + iAncla);
    var $totalsumr  = $tr.find(".totalsuma_r");
    var dTotalResta = 0;

    $tr.find(".r").each(function( index ) {
     $r = $(this);

     dTotalResta += get_numeric($r.val(), 4);

    });

    $totalsumr.val(number_round(dTotalResta, 4));


    // r2

     var $cubo1 = $tr.find(".cubo_1");
     var $cubo2 = $tr.find(".cubo_2");
     var $cubo3 = $tr.find(".cubo_3");
     var $cubo4 = $tr.find(".cubo_4");

     var $rr1 = $tr.find(".r.r_1").first();
     var $rr2 = $tr.find(".r.r_2").first();
     var $rr3 = $tr.find(".r.r_3").first();
     var $rr4 = $tr.find(".r.r_4").first();

     let dRr1  = get_numeric($rr1.val(), 4);
     let dRr2  = get_numeric($rr2.val(), 4);
     let dRr3  = get_numeric($rr3.val(), 4);
     let dRr4  = get_numeric($rr4.val(), 4);

     let dCubo1 = 0;
     let dCubo2 = 0;
     let dCubo3 = 0;
     let dCubo4 = 0;
     let totalcubo = 0;

     dCubo1 = dRr1 * dRr1;
     dCubo2 = dRr2 * dRr2;
     dCubo3 = dRr3 * dRr3;
     dCubo4 = dRr4 * dRr4;

     dCubo1 = dCubo1.toFixed(10);
     dCubo2 = dCubo2.toFixed(10);
     dCubo3 = dCubo3.toFixed(10);
     dCubo4 = dCubo4.toFixed(10);


     $cubo1.val(dCubo1);
     $cubo2.val(dCubo2);
     $cubo3.val(dCubo3);
     $cubo4.val(dCubo4);

    var $cubo   = $tr.find(".cubo_" + iAncla);
    var $totalcubo  = $tr.find(".cubo.totalcubo" );
    var dTotalCubo = 0;

    $tr.find(".cubo").each(function( index ) {
    $cubo = $(this);

    if(index < 4)
    {
      dTotalCubo+= get_numeric($cubo.val(), 10);
    }

    });

    totalcubo = dTotalCubo.toFixed(10);
    $totalcubo.val(totalcubo);


    // Diferencia de apertura de los angulos

    var $cubo  = $tr.find(".cubo_" + iAncla);
    var dTotalSumCubo= 0;

    $(".roww").each(function( index ) {
    $roww = $(this);

    $roww.find(".cubo").each(function( index ) {
    $cubo = $(this);

    if(index == 4)
    {
      dTotalSumCubo+= get_numeric($cubo.val(), 10);

       $( ".apertura" ).first().val(number_truncate(dTotalSumCubo , 10));
    }

    });

    });



    //

    var $apertura = $(".apertura").first();
    var dApertura  = get_numeric($apertura.val(), 10);
    var dDiv = 0;

    dDiv = dApertura / 6 ;

    dDiv = Math.sqrt(dDiv);

    $( ".paraserie" ).first().val(number_truncate(dDiv, 4));

});



function toFix(x)
{
  if (Math.abs(x) < 1.0)
  {
    var e = parseInt(x.toString().split('e-')[1]);
    if (e) {
        x *= Math.pow(10,e-1);
        x = '0.' + (new Array(e)).join('0') + x.toString().substring(2);
    }
  } else {
    var e = parseInt(x.toString().split('+')[1]);
    if (e > 20) {
        e -= 20;
        x /= Math.pow(10,e);
        x += (new Array(e+1)).join('0');
    }
  }
  return x;
}

$("#data").load(" #data");

$(".btnSubmit").on( "click", function(evt) {
  evt.preventDefault();

  var $btnSubmit = $(this);

  var $form = $btnSubmit.closest("form");

  var qs = $form.serialize();

  var _token = $('meta[name="_token"]').first().attr('content');

  var xhr = $.post('/sandbox/save', { '_token': _token, 'qs':qs }, null, null);

  xhr.done(function(response){
    alert("guardado !!");
  });
});

</script>
@endpush

