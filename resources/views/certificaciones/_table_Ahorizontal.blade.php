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

                    </tr>
                </thead>
                <tbody id="reportAngulosHorizontales" class="text-center">
                    <?php
                    $cont = 0;

                    ?>

                    @foreach($report->angulosHorizontales['i'] as $m)

                        <tr id="row">
                            <td>

                            {{ $index1++ }}

                            </td>

                            <!-- k -->
                            <td >
                              @for($i = 0; $i < 4; ++$i)
                              <input type="text" class="input_{{ $i }}" name="k[]" value="{{ $report->angulosHorizontales['k'][$i] }}" style="text-align:center;" disabled ><br>
                              @endfor
                            </td>

                            <!-- cara1 -->
                            <td>
                              <input type="text" class="cara1 cara1_1" data-ancla="1" /><br>
                              <input type="text" class="cara1 cara1_2" data-ancla="2" /><br>
                              <input type="text" class="cara1 cara1_3" data-ancla="3" /><br>
                              <input type="text" class="cara1 cara1_4" data-ancla="4" /><br>
                               <input type="text" class="total_cara1"  data-ancla ="1" disabled /><br>
                            </td>

                            <!-- cara2 -->
                            <td>
                            <span class="disabled">
                            <input type="text" class="cara2 cara2_1" data-ancla="1" /><br>
                            <input type="text" class="cara2 cara2_2" data-ancla="2" /><br>
                            <input type="text" class="cara2 cara2_3" data-ancla="3" /><br>
                            <input type="text" class="cara2 cara2_4" data-ancla="4" /><br>
                            <input type="text" class="total_cara2" disabled /><br>
                            </span>
                            </td>

                            <!-- suma_c1_c2 -->
                            <td>
                                <span class="disabled">
                                <input type="text" class="suma_c1_c2_1" data-ancla="1" disabled /><br>
                                <input type="text" class="suma_c1_c2_2" data-ancla="2" disabled /><br>
                                <input type="text" class="suma_c1_c2_3" data-ancla="3" disabled /><br>
                                <input type="text" class="suma_c1_c2_4" data-ancla="4" disabled /><br>
                                </span>
                            </td>

                              <!-- promedio -->

                             <td>
                                <span class="disabled">
                                <input type="text" class="promedio prom_1" data-ancla="1" disabled /><br>
                                <input type="text" class="promedio prom_2" data-ancla="2" disabled /><br>
                                <input type="text" class="promedio prom_3" data-ancla="3" disabled /><br>
                                <input type="text" class="promedio prom_4" data-ancla="4" disabled /><br>
                                <input type="text" class="totalpromedio" disabled/><br>
                                </span>
                            </td>

                            </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
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
  let dTotal;
  let dPromedio;
  let dTotalSumatoriaCara1 = 0;
  let dTotalSumatoriaCara2 = 0;
  let dTotalSumatoriaPromedio = 0;

  if(dCara1 > 200)
  {
    dTotal = (dCara1 + dCara2) + 200;
  }
  else
  {
    dTotal = (dCara1 + dCara2) - 200;
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

  $tr.find( ".promedio").each(function( index ) {
    $promedio = $(this);

    dTotalSumatoriaPromedio+= get_numeric($promedio.val(), 4);
  });

 $totalpromedio.val(dTotalSumatoriaPromedio);


});
</script>
@endpush

<!-- <div class="col-sm-12 col-lg-12">
    <button type="submit" class="btn btn-lg my-4 btn-primary font-weight-bold">Guardar</button>
</div> -->