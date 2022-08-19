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

<form id="frmMedicion">

      <div class="table-responsive">
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

                  ?>

                  @foreach($report->angulosHorizontales['i'] as $m)



                      <tr id="row{{ $index1 }}" class="roww">


                          <td>

                          {{ $index1++ }}

                          </td>

                          <!-- k -->
                          <td >
                            @for($i = 0; $i < 4; ++$i)
                            <input type="text" class="input_{{ $i }}" name="k[]" value="{{ $report->angulosHorizontales['k'][$i] }}" style="text-align:center;width: 50px; "; disabled ><br>
                            @endfor
                          </td>

                          <!-- cara1 -->
                          <td>
                            <input type="text" class="cara1 cara1_1" name="cara1[]" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" /><br>
                            <input type="text" class="cara1 cara1_2" name="cara1[]" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" /><br>
                            <input type="text" class="cara1 cara1_3" name="cara1[]" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" /><br>
                            <input type="text" class="cara1 cara1_4" name="cara1[]" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" /><br>
                            <input type="text" class="total_cara1"  style="widht: 60px;width: 100px;text-align: center;" data-ancla ="1" disabled /><br>
                          </td>

                          <!-- cara2 -->
                          <td>
                          <span class="disabled">
                          <input type="text" class="cara2 cara2_1" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" /><br>
                          <input type="text" class="cara2 cara2_2" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" /><br>
                          <input type="text" class="cara2 cara2_3" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" /><br>
                          <input type="text" class="cara2 cara2_4" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" /><br>
                          <input type="text" class="total_cara2"  style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                          </span>
                          </td>

                          <!-- suma_c1_c2 -->
                          <td>
                              <span class="disabled">
                              <input type="text" class="suma_c1_c2_1" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" disabled /><br>
                              <input type="text" class="suma_c1_c2_2" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" disabled /><br>
                              <input type="text" class="suma_c1_c2_3" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" disabled /><br>
                              <input type="text" class="suma_c1_c2_4" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" disabled /><br>
                              </span>
                          </td>

                            <!-- promedio -->

                           <td>
                              <span class="disabled">
                              <input type="text" class="promedio prom_1" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" disabled /><br>
                              <input type="text" class="promedio prom_2" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" disabled /><br>
                              <input type="text" class="promedio prom_3" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" disabled /><br>
                              <input type="text" class="promedio prom_4" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" disabled /><br>
                              <input type="text" class="totalpromedio" style="widht: 60px;width: 100px;text-align: center;"   disabled/><br>
                              </span>
                          </td>

                           <!-- suma de los promedios =400-F2+F3, =400-F2+F4 ... -->

                          <td>
                              <span class="disabled">
                              <input type="text" class="sumaprom sumaprom_1" style="widht: 60px;width: 100px;text-align: center;" value="{{ $report->angulosHorizontales['sumaprom'][$cont] }}" disabled /><br>
                              <input type="text" class="sumaprom sumaprom_2" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" disabled /><br>
                              <input type="text" class="sumaprom sumaprom_3" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" disabled /><br>
                              <input type="text" class="sumaprom sumaprom_4" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" disabled /><br>
                              <input type="text" class="sumaprom totalsumaprom" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" disabled /><br>
                              </span>
                          </td>

                           <!-- promedio de las sumas =PROMEDIO(G3,G9,G15)... -->

                           <td>
                              <span class="disabled">
                              <input type="text" style="widht: 60px;width: 100px;text-align: center;" value="{{ $report->angulosHorizontales['promsuma'][$cont] }}" disabled /><br>
                              <input type="text" class="promsuma promsuma_1" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              <input type="text" class="promsuma promsuma_2" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              <input type="text" class="promsuma promsuma_3" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              <input type="text" class="promsuma promsuma_4" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              </span>
                          </td>

                           <!-- restas de promedio =H3-G3, =H4-G4 ... -->

                            <td>
                              <span class="disabled">
                              <input type="text" class="restaprom restaprom_1" style="widht: 60px;width: 100px;text-align: center;" value="{{ $report->angulosHorizontales['vacio3'][$cont] }}" disabled /><br>
                              <input type="text" class="restaprom restaprom_2" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" disabled /><br>
                              <input type="text" class="restaprom restaprom_3" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" disabled /><br>
                              <input type="text" class="restaprom restaprom_4" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" disabled /><br>
                              <input type="text" class="restaprom restaprom_5" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" disabled /><br>
                              </span>
                          </td>

                           <!-- vacio4 -->

                          <td>
                              <span class="disabled">
                             <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              </span>
                          </td>

                          <!-- r -->

                           <td>
                              <span class="disabled">
                              <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                               <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                               <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              </span>
                          </td>

                           <!-- r2 -->

                          <td>
                              <span class="disabled">
                              <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                               <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                               <input type="text" style="widht: 60px;width: 100px;text-align: center;" disabled /><br>
                              </span>
                          </td>

                          </tr>
                  @endforeach


              </tbody>
          </table>
      </div>




<input type="button" class="btnSubmit" value="Aceptar" />
</form>





    </div>
</div>

@push('custom-scripts')
<script type="text/javascript">
$(document).on("keyup", ".cara1, .cara2", function(evt){
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

  $total_cara1.val(number_round(dTotalSumatoriaCara1, 3));

  $tr.find( ".cara2").each(function( index ) {
    $cara2 = $(this);

    dTotalSumatoriaCara2+= get_numeric($cara2.val(), 4);
  });

  $total_cara2.val(number_round(dTotalSumatoriaCara2, 3));

  $tr.find(".promedio").each(function( index ) {
    $promedio = $(this);

    dTotalSumatoriaPromedio+= get_numeric($promedio.val(), 4);
  });

 $totalpromedio.val(number_truncate(dTotalSumatoriaPromedio, 4));

  // =400-F2+F3, =400-F2+F4 ...

  dTotal = 0;

  let $promedio1 = $tr.find(".promedio.prom_1").first();
  let dProm1     = get_numeric($promedio1.val(), 4);
  let dSumaProm    = 0;
  let dTotalSumaProm = 0;

  $tr.find(".promedio").each(function( index ) {
    $promedio = $(this);

    dSumaProm = 400;

    $aux = $tr.find(".promedio.prom_" + $promedio.data("ancla"));
    $sumaprom = $tr.find(".sumaprom.sumaprom_" + $promedio.data("ancla"));

    dTotal = get_numeric($aux.val(), 4);

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


  });

  $tr.find(".totalsumaprom").val(number_truncate(dTotalSumaProm, 4));



// =PROMEDIO(G3,G9,G15)...

  var $sumaprom  = $tr.find(".sumaprom_" + iAncla);

  var dTotalPromSuma_ind1 = 0;
  var dTotalPromSuma_ind2 = 0;
  var dTotalPromSuma_ind3 = 0;
  var dTotalPromSuma_ind4 = 0;

  var div1 = 0;
  var div2 = 0;
  var div3 = 0;
  var div4 = 0;

  $(".roww").each(function( index ) {
    $roww = $(this);

    $roww.find(".sumaprom").each(function( index ) {
      $sumaprom = $(this);

      if(index == 1)
      {
        dTotalPromSuma_ind1+= get_numeric($sumaprom.val(), 4);
      }

      if(index == 2)
      {
        dTotalPromSuma_ind2+= get_numeric($sumaprom.val(), 4) ;
      }

      if(index == 3)
      {
      dTotalPromSuma_ind3+= get_numeric($sumaprom.val(), 4);
      }

      if(index == 4)
      {
      dTotalPromSuma_ind4+= get_numeric($sumaprom.val(), 4);
      }

    });

  });

  $(".roww").each(function( index ) {
    $roww = $(this);

    $promsuma1 = $roww.find(".promsuma_1").first();
    $promsuma2 = $roww.find(".promsuma_2").first();
    $promsuma3 = $roww.find(".promsuma_3").first();
    $promsuma4 = $roww.find(".promsuma_4").first();

    div1 = dTotalPromSuma_ind1 / 3;
    div2 = dTotalPromSuma_ind2 / 3;
    div3 = dTotalPromSuma_ind3 / 3;
    div4 = dTotalPromSuma_ind4 / 3;

    $promsuma1.val(number_truncate(div1 , 4));
    $promsuma2.val(number_truncate(div2 , 4));
    $promsuma3.val(number_truncate(div3 , 4));
    $promsuma4.val(number_truncate(div4 , 4));
  });


// =H3-G3, =H4-G4 ...







});

















$(".btnSubmit").on( "click", function(evt) {
  evt.preventDefault();

  var $btnSubmit = $(this);
  var $form = $btnSubmit.closest("form");

  var qs = $form.serialize();

  var _token = $('meta[name="_token"]').first().attr('content');

  var xhr = $.post('/sandbox/save', { '_token': _token, 'qs':qs }, null, 'json');

  xhr.done(function(response){

  });
});

</script>
@endpush

<!-- <div class="col-sm-12 col-lg-12">
    <button type="submit" class="btn btn-lg my-4 btn-primary font-weight-bold">Guardar</button>
</div> -->