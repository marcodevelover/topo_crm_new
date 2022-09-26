<style>
    td input.form-control{
        width:60px;
    }

    .margin{
      margin:1px;
    }

</style>
<div class="card my-2">
    <div class="card-header">
        <h5 class="my-1">Reporte de medición (Angulos Verticales)</h5>
    </div>
    <div class="card-body">
        <?php
            $index1 = 1;
            $index2 = 21;
            $cont = 0;
        ?>
<!--<form>
-->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th>j</th>
                        <th>k</th>
                        <th>Xj,k1</th>
                        <th>Xj,k2</th>
                        <th>sigma</th>
                        <th>xj,k</th>
                        <th>xk</th>
                        <th>rj,k</th>
                        <th>rj,k2</th>

                    </tr>
                </thead>
                <tbody id="reportAngulosVertical" class="text-center">
                    <?php
                    $cont = 0;

                    ?>

                    @foreach((array)$report->angulosVerticales['i'] as $m)

                        <tr id="row" class="roww">
                            <td>

                            {{ $index1++ }}

                            </td>

                            <!-- k -->
                            <td >
                              @for($i = 0; $i < 5; ++$i)
                              <input type="text" class="margin input_{{ $i }}" value="{{ $report->angulosVerticales['k'][$i] }}" style="text-align:center;width: 50px; " disabled ><br>
                              @endfor
                            </td>

                            <!-- Xj,k1 -->
                            <td>
                              <input type="text" class="margin Xj1 Xj1_1" name="Xj1[{{ $loop->index }}][_1]" value="{{ $angulos_v['Xj1'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;"  data-ancla="1" /><br>
                              <input type="text" class="margin Xj1 Xj1_2" name="Xj1[{{ $loop->index }}][_2]" value="{{ $angulos_v['Xj1'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" /><br>
                              <input type="text" class="margin Xj1 Xj1_3" name="Xj1[{{ $loop->index }}][_3]" value="{{ $angulos_v['Xj1'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" /><br>
                              <input type="text" class="margin Xj1 Xj1_4" name="Xj1[{{ $loop->index }}][_4]" value="{{ $angulos_v['Xj1'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" /><br>
                              <input type="text" class="disabledinput total_Xj1" name="Xj1[{{ $loop->index }}][_total]" value="{{ $angulos_v['Xj1'][$loop->index]['_total'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" readonly /><br>
                            </td>

                            <!-- Xj,k2 -->
                            <td>
                            <span class="disabled">
                            <input type="text" class="margin Xj2 Xj2_1" name="Xj2[{{ $loop->index }}][_1]" value="{{ $angulos_v['Xj2'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;"  data-ancla="1" /><br>
                            <input type="text" class="margin Xj2 Xj2_2" name="Xj2[{{ $loop->index }}][_2]" value="{{ $angulos_v['Xj2'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;"  data-ancla="2" /><br>
                            <input type="text" class="margin Xj2 Xj2_3" name="Xj2[{{ $loop->index }}][_3]" value="{{ $angulos_v['Xj2'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;"  data-ancla="3" /><br>
                            <input type="text" class="margin Xj2 Xj2_4" name="Xj2[{{ $loop->index }}][_4]" value="{{ $angulos_v['Xj2'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;"  data-ancla="4" /><br>
                            <input type="text" class="disabledinput total_Xj2" name="Xj2[{{ $loop->index }}][_total]" value="{{ $angulos_v['Xj2'][$loop->index]['_total'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" class="total_Xj2" readonly /><br>
                            </span>
                            </td>

                            <!-- Sigma -->
                            <td>
                            <span class="disabled">
                            <input type="text" class="disabledinput sigma sigma_1" name="sigma[{{ $loop->index }}][_1]" value="{{ $angulos_v['sigma'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                            <input type="text" class="disabledinput sigma sigma_2" name="sigma[{{ $loop->index }}][_2]" value="{{ $angulos_v['sigma'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                            <input type="text" class="disabledinput sigma sigma_3" name="sigma[{{ $loop->index }}][_3]" value="{{ $angulos_v['sigma'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                            <input type="text" class="disabledinput sigma sigma_4" name="sigma[{{ $loop->index }}][_4]" value="{{ $angulos_v['sigma'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" readonly /><br>
                            <input type="text" class="disabledinput total_sigma"   name="sigma[{{ $loop->index }}][_total]" value="{{ $angulos_v['sigma'][$loop->index]['_total'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                            </span>
                            </td>

                            <!-- xj, k  -->
                            <td>
                            <span class="disabled">
                            <input type="text" class="disabledinput xj xj_1" name="xj[{{ $loop->index }}][_1]" value="{{ $angulos_v['xj'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                            <input type="text" class="disabledinput xj xj_2" name="xj[{{ $loop->index }}][_2]" value="{{ $angulos_v['xj'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                            <input type="text" class="disabledinput xj xj_3" name="xj[{{ $loop->index }}][_3]" value="{{ $angulos_v['xj'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                            <input type="text" class="disabledinput xj xj_4" name="xj[{{ $loop->index }}][_4]" value="{{ $angulos_v['xj'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" readonly /><br>
                            <input type="text" class="disabledinput totalxj" name="xj[{{ $loop->index }}][_total]" value="{{ $angulos_v['xj'][$loop->index]['_total'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                            </span>
                            </td>

                            <!-- xk -->
                            <td>
                            <span class="disabled">
                            <input type="text" class="disabledinput xk xk_1" name="xk[{{ $loop->index }}][_1]" value="{{ $angulos_v['xk'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;"  data-ancla="1" readonly /><br>
                            <input type="text" class="disabledinput xk xk_2" name="xk[{{ $loop->index }}][_2]" value="{{ $angulos_v['xk'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                            <input type="text" class="disabledinput xk xk_3" name="xk[{{ $loop->index }}][_3]" value="{{ $angulos_v['xk'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                            <input type="text" class="disabledinput xk xk_4" name="xk[{{ $loop->index }}][_4]" value="{{ $angulos_v['xk'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" readonly /><br>
                            <input type="text" class="disabledinput totalxk" name="xk[{{ $loop->index }}][_total]" value="{{ $angulos_v['xk'][$loop->index]['_total'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                            </span>
                            </td>

                            <!-- rj,k -->
                            <td>
                            <span class="disabled">
                            <input type="text" class="disabledinput rj1 rj1_1" name="rj1[{{ $loop->index }}][_1]" value="{{ $angulos_v['rj1'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                            <input type="text" class="disabledinput rj1 rj1_2" name="rj1[{{ $loop->index }}][_2]" value="{{ $angulos_v['rj1'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                            <input type="text" class="disabledinput rj1 rj1_3" name="rj1[{{ $loop->index }}][_3]" value="{{ $angulos_v['rj1'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                            <input type="text" class="disabledinput rj1 rj1_4" name="rj1[{{ $loop->index }}][_4]" value="{{ $angulos_v['rj1'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" readonly /><br>
                            <input type="text" class="disabledinput totalrj1"  name="rj1[{{ $loop->index }}][_total]" value="{{ $angulos_v['rj1'][$loop->index]['_total'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
                            </span>
                            </td>

                            <!-- rj,k2 -->
                            <td>
                            <span class="disabled">
                            <input type="text" class="disabledinput rj2 rj2_1" name="rj2[{{ $loop->index }}][_1]" value="{{ $angulos_v['rj2'][$loop->index]['_1'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;"  data-ancla="1" readonly /><br>
                            <input type="text" class="disabledinput rj2 rj2_2" name="rj2[{{ $loop->index }}][_2]" value="{{ $angulos_v['rj2'][$loop->index]['_2'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="2" readonly /><br>
                            <input type="text" class="disabledinput rj2 rj2_3" name="rj2[{{ $loop->index }}][_3]" value="{{ $angulos_v['rj2'][$loop->index]['_3'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="3" readonly /><br>
                            <input type="text" class="disabledinput rj2 rj2_4" name="rj2[{{ $loop->index }}][_4]" value="{{ $angulos_v['rj2'][$loop->index]['_4'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="4" readonly /><br>
                            <input type="text" class="disabledinput rj2 totalrj2" name="rj2[{{ $loop->index }}][_total]" value="{{ $angulos_v['rj2'][$loop->index]['_total'] ?? "" }}" style="widht: 60px;width: 100px;text-align: center;" data-ancla="1" readonly /><br>
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
            <td>s=</td>
            <td>
              <input type="text" class="disabledinput sumatotalrj2" name="sumatotalrj2" value="{{ $angulos_v['sumatotalrj2'] ?? "" }}" style="float: right" readonly />
              <input type="text" class="disabledinput raizsumatoria"  name="raizsumatoria" value="{{ $angulos_v['raizsumatoria'] ?? "" }}" readonly />
            </td>
            </tr>
            </tbody>
            </table>
        </div>



   <!-- <input type="button" class="btnSubmit btn-lg my-4 btn-primary font-weight-bold" value="Aceptar" />   -->
    <!--<button type="submit" class="btn font-weight-bold">Guardar Datos</button> -->
    <br>
    <button type="button" class="btnSubmit btn font-weight-bold btn-primary">Guardar Datos</button>

 <!--   </form>
-->


    </div>
</div>

@push('custom-scripts')
<script type="text/javascript">

$(document).on("keyup", ".Xj1, .Xj2", function(evt){

  var $Xj = $(this);

  var $tr    = $Xj.closest("tr");
  var iAncla = $Xj.data("ancla");

  var $Xj1   = $tr.find(".Xj1_" + iAncla);
  var $Xj2   = $tr.find(".Xj2_" + iAncla);
  var $sigma = $tr.find(".sigma_" + iAncla);

  var dXj1   = get_numeric($Xj1.val(),4);
  var dXj2   = get_numeric($Xj2.val(),4);
  var dTotal = 0;


  $sigma.val('');
  $tr.find(".xj_" + iAncla).val('');

  if($Xj1.val().toString().length > 0 && $Xj2.val().toString().length > 0)
  {
    var $total_Xj1   = $tr.find(".total_Xj1");
    var $total_Xj2   = $tr.find(".total_Xj2");
    var $total_sigma = $tr.find(".total_sigma");

    var dTotalSumatoriaXj1   = 0;
    var dTotalSumatoriaXj2   = 0;
    var dTotalSumatoriaSigma = 0;

    $("#reportAngulosVertical").find(".roww").each(function( index_roww ) {
      $roww = $(this);

      $roww.find(".sigma").each(function( index_s ) {
        $sigma = $(this);

        $Xj1 = $roww.find(".Xj1_" +  $sigma.data("ancla"));
        dXj1 = get_numeric($Xj1.val(),4);

        $Xj2 = $roww.find(".Xj2_" +  $sigma.data("ancla"));
        dXj2 = get_numeric($Xj2.val(),4);

        dAux = 0;

        if(index_roww == 0)
        {
          if(index_s == 1)
          {
            if(dXj1 > 0 && dXj2 > 0)
            {
              dAux = dXj1 + dXj2 - 400;
            }
          }
          else
          {
            dAux = (dXj1 + dXj2 - 400)/2;
          }
        }
        else
        {
          if(dXj1 > 0 && dXj2 > 0)
          {
            dAux = (dXj1 + dXj2 - 400)/2;
          }
        }

        $sigma.val(number_round(dAux, 5));
      });
    });


 /*   if(dXj1 > 0 && dXj2 > 0)
    {
      dTotal = (dXj1 + dXj2 - 400) / 2;
    }

    dTotal = number_round(dTotal, 5);

    $sigma.val(dTotal);*/

    // Sumatoria Total Xj1
    $tr.find( ".Xj1").each(function( index ) {
      $Xj1 = $(this);

      dTotalSumatoriaXj1+= get_numeric($Xj1.val(), 4);
    });

    $total_Xj1.val(number_round(dTotalSumatoriaXj1, 3));

    // Sumatoria Total Xj2
    $tr.find( ".Xj2").each(function( index ) {
      $Xj2 = $(this);

      dTotalSumatoriaXj2+= get_numeric($Xj2.val(), 4);
    });

    $total_Xj2.val(number_round(dTotalSumatoriaXj2, 4));

    // Sumatoria Total sigma
    $tr.find( ".sigma").each(function( index ) {
      $sigma = $(this);

      dTotalSumatoriaSigma+= get_numeric($sigma.val(), 5);
    });

    $total_sigma.val(number_round(dTotalSumatoriaSigma, 5));

    // calculando cada xj,k por ancla

      $xj = $tr.find(".xj_" + iAncla);

      $xj.val(0);

      $xj = $tr.find(".xj_" + iAncla);

      var $Xj1   = $tr.find(".Xj1_"+ iAncla).first();
      var $sigma = $tr.find(".sigma_" + iAncla).first();

      dXj    = get_numeric($Xj1.val(), 5);
      dSigma = get_numeric($sigma.val(), 5);

      dAux = dXj - dSigma;
      $xj.val(number_round(dAux, 5));


    // Sumatoria de xj

      var $totalxj = $tr.find(".totalxj");
      var dTotalSumatoriaxj = 0;

      $tr.find( ".xj").each(function( index ) {
      $xj = $(this);

        dTotalSumatoriaxj+= get_numeric($xj.val(), 5);

      });

      $totalxj.val(number_round(dTotalSumatoriaxj, 5));


    // =PROMEDIO(F2,F7,F12) xk

    var $xj  = $tr.find(".xj_" + iAncla);

    var dTotalProm_ind1 = 0;
    var dTotalProm_ind2 = 0;
    var dTotalProm_ind3 = 0;
    var dTotalProm_ind4 = 0;

    var div1 = 0;
    var div2 = 0;
    var div3 = 0;
    var div4 = 0;

    var iPromSumas1 = 0;
    var iPromSumas2 = 0;
    var iPromSumas3 = 0;
    var iPromSumas4 = 0;


    $(".roww").each(function( index ) {
    $roww = $(this);

    $roww.find(".xj").each(function( index ) {
      $xj = $(this);

      if(index == 0)
      {
        if($xj.val().toString().length > 0)
        {
          dTotalProm_ind1+= get_numeric($xj.val(), 5);

          iPromSumas1+=1;
        }
      }

      if(index == 1)
      {
        if($xj.val().toString().length > 0)
        {
          dTotalProm_ind2+= get_numeric($xj.val(), 5) ;

          iPromSumas2+=1;
        }
      }

      if(index == 2)
      {
        if($xj.val().toString().length > 0)
        {
          dTotalProm_ind3+= get_numeric($xj.val(), 5);

           iPromSumas3+=1;
        }
      }

      if(index == 3)
      {
        if($xj.val().toString().length > 0)
        {
          dTotalProm_ind4+= get_numeric($xj.val(), 5);

          iPromSumas4+=1;
        }
      }

    });

  });

  $(document).find(".xk_1").val("");
  $(document).find(".xk_2").val("");
  $(document).find(".xk_3").val("");
  $(document).find(".xk_4").val("");

  $(".roww").each(function( index ) {
    $roww = $(this);

    if(iPromSumas1 >= 3)
    {
      $xk1 = $roww.find(".xk_1").first();
      div1 = dTotalProm_ind1 / 3;
      $xk1.val(number_truncate(div1, 5));
    }

    if(iPromSumas2 >= 3)
    {
      $xk2 = $roww.find(".xk_2").first();
      div2 = dTotalProm_ind2 / 3;
      $xk2.val(number_truncate(div2, 5));
    }

    if(iPromSumas3 >= 3)
    {
      $xk3 = $roww.find(".xk_3").first();
      div3 = dTotalProm_ind3 / 3;
      $xk3.val(number_truncate(div3, 5));
    }

    if(iPromSumas4 >= 3)
    {
      $xk4 = $roww.find(".xk_4").first();
      div4 = dTotalProm_ind4 / 3;
      $xk4.val(number_truncate(div4, 5));
    }

  });

  // Sumatoria de xk
    $xk = $tr.find(".xk_" + iAncla)
    var $totalxk = $tr.find(".totalxk");
    var dTotalSumatoriaxk = 0;

   /* $tr.find( ".xk").each(function( index ) {
    $xk = $(this);

    dTotalSumatoriaxk+= get_numeric($xk.val(), 5);

    });

    $totalxk.val(number_round(dTotalSumatoriaxk, 5));*/

      $(".roww").each(function( index_roww ) {
      $roww = $(this);

      dTotalResta = 0;

      $roww.find(".xk").each(function( index ) {
        $xk = $(this);


          if($xk.val().toString().length > 0)
          {
            dTotalResta+= get_numeric($xk.val(), 5);
          }

      });

      $roww.find(".totalxk").val(number_round(dTotalResta, 5));
    });

  // Calculando rj1 por ancla

    $rj1 = $tr.find(".rj1_" + iAncla);

    var $xk   = $tr.find(".xk_"+ iAncla).first();
    var $xj = $tr.find(".xj_" + iAncla).first();

 /*   dXk    = get_numeric($xk.val(), 6);
    dXj = get_numeric($xj.val(), 6);

    dAux = dXk - dXj;

    $rj1.val(number_round(dAux, 5));*/

  $(".roww").each(function( index ) {
      $roww = $(this);

      $roww.find(".rj1").each(function( index ) {
        $rj1 = $(this);

        if(index == 0)
        {
          $xk  = $roww.find(".xk").eq(index);
          $xj = $roww.find(".xj").eq(index);

          $rj1.val("");

          if($xk.val().toString().length > 0 && $xj.val().toString().length > 0)
          {

            dXk = get_numeric($xk.val(), 6);

            dXj = get_numeric($xj.val(), 6)

            dAux = dXk - dXj;

            $rj1.val(number_round(dAux, 5));
          }
        }

        if(index == 1)
        {
          $xk  = $roww.find(".xk").eq(index);
          $xj = $roww.find(".xj").eq(index);

          $rj1.val("");

          if($xk.val().toString().length > 0 && $xj.val().toString().length > 0)
          {

            dXk = get_numeric($xk.val(), 5);

            dXj = get_numeric($xj.val(), 5)

            dAux = dXk - dXj;

            $rj1.val(number_round(dAux, 5));
          }
        }

        if(index == 2)
        {
          $xk  = $roww.find(".xk").eq(index);
          $xj = $roww.find(".xj").eq(index);

          $rj1.val("");

          if($xk.val().toString().length > 0 && $xj.val().toString().length > 0)
          {

            dXk = get_numeric($xk.val(), 5);

            dXj = get_numeric($xj.val(), 5)

            dAux = dXk - dXj;

            $rj1.val(number_round(dAux, 5));
          }
        }

        if(index == 3)
        {
          $xk  = $roww.find(".xk").eq(index);
          $xj = $roww.find(".xj").eq(index);

          $rj1.val("");

          if($xk.val().toString().length > 0 && $xj.val().toString().length > 0)
          {

            dXk = get_numeric($xk.val(), 5);

            dXj = get_numeric($xj.val(), 5)

            dAux = dXk - dXj;

            $rj1.val(number_round(dAux, 5));
          }
        }

    });

  });

  // Sumatoria de rj1

    $rj1 = $tr.find(".rj1_" + iAncla);
    var $totalrj1 = $tr.find(".totalrj1");
    var dTotalSumatoriarj1 = 0;

    /*$tr.find( ".rj1").each(function( index ) {
    $rj1 = $(this);

    dTotalSumatoriarj1+= get_numeric($rj1.val(), 5);

    });

    $totalrj1.val(number_round(dTotalSumatoriarj1, 6));*/

    $(".roww").each(function( index_roww ) {
      $roww = $(this);

      dTotalSumatoriarj1 = 0;

      $roww.find(".rj1").each(function( index ) {
        $rj1 = $(this);


          if($rj1.val().toString().length > 0)
          {
            dTotalSumatoriarj1+= get_numeric($rj1.val(), 5);
          }

      });

      $roww.find(".totalrj1").val(number_round(dTotalSumatoriarj1, 6));
    });

    // rj k2 al cuadrado

    dTotal = 0;
    $totalrj2 = $tr.find( ".totalrj2");

    /*$tr.find( ".rj1").each(function( index ) {
      $rj1 = $(this);
      $rj2 = $tr.find( ".rj2_" + $rj1.data("ancla"));


      dRj1 = get_numeric($rj1.val(), 6);

        dAux   = dRj1 * dRj1;
        dTotal+= dAux;
        $rj2.val(dAux.toFixed(10));


    });

    $tr.find( ".totalrj2").val(dTotal.toFixed(10));*/

    $(".roww").each(function( index_roww ) {
      $roww = $(this);


      $roww.find( ".rj2").each(function( index_rj2 ) {
        $rj2 = $(this);


        $rj1 = $roww.find( ".rj1_" + $rj2.data("ancla"));

        if(index_rj2 <= 3)
        {
          dRj1 = get_numeric($rj1.val(), 6);

          dAux   = dRj1 * dRj1;

          $rj2.val(dAux.toFixed(10));
        }
      });
    });


     $(".roww").each(function( index_roww ) {
      $roww = $(this);

      var dTotalRj2 = 0;
      var $rj2   = $roww.find(".rj2_" + iAncla);
      var $totalrj2  = $roww.find(".totalrj2" );

      $roww.find(".rj2").each(function( index ) {
        $rj2 = $(this);

        if(index <= 3)
        {
          dTotalRj2+= get_numeric($rj2.val(), 10);
        }
      });

     $totalrj2.val(dTotalRj2.toFixed(10));

    });

   //Sumatoria de los totales de rj2

    var $rj2  = $tr.find(".rj2_" + iAncla);
    var dTotalSumRj2= 0;

    $(".roww").each(function( index ) {
    $roww = $(this);

    $roww.find(".rj2").each(function( index ) {
    $rj2 = $(this);

    if(index == 4)
    {
      dTotalSumRj2+= get_numeric($rj2.val(), 10);

      $( ".sumatotalrj2" ).first().val(dTotalSumRj2.toFixed(9));
    }

    });

    });



    //

      var $sumatotalrj2 = $(".sumatotalrj2").first();
      var dSumatoriaTotalrj2  = get_numeric($sumatotalrj2.val(), 10);
      var dDiv = 0;

      dDiv = dSumatoriaTotalrj2 / 8 ;

      dDiv = Math.sqrt(dDiv);

      $( ".raizsumatoria" ).first().val(number_round(dDiv, 5));


 }


});

</script>
@endpush

