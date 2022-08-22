<style>
    td input.form-control{
        width:60px;
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

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th>j</th>
                        <th>k</th>
                        <th>Xj,k1</th>
                        <th>Xj,k2</th>
                        <th>sigma</th>

                    </tr>
                </thead>
                <tbody id="reportAngulosHorizontales" class="text-center">
                    <?php
                    $cont = 0;

                    ?>

                    @foreach($report->angulosVerticales['i'] as $m)

                        <tr id="row">
                            <td>

                            {{ $index1++ }}

                            </td>

                            <!-- k -->
                            <td >
                              @for($i = 0; $i < 4; ++$i)
                              <input type="text" class="input_{{ $i }}" name="k[]" value="{{ $report->angulosVerticales['k'][$i] }}" style="text-align:center;" disabled ><br>
                              @endfor
                            </td>

                            <!-- Xj,k1 -->
                            <td>
                              <input type="text" class="Xj1 k1_1" data-ancla="1" /><br>
                              <input type="text" class="Xj1 k1_2" data-ancla="2" /><br>
                              <input type="text" class="Xj1 k1_3" data-ancla="3" /><br>
                              <input type="text" class="Xj1 k1_4" data-ancla="4" /><br>
                               <input type="text" class="total_Xj"  data-ancla ="1" disabled /><br>
                            </td>

                            <!-- Xj,k2 -->
                            <td>
                            <span class="disabled">
                            <input type="text" class="Xj2 k2_1" data-ancla="1" /><br>
                            <input type="text" class="Xj2 k2_2" data-ancla="2" /><br>
                            <input type="text" class="Xj2 k2_3" data-ancla="3" /><br>
                            <input type="text" class="Xj2 k2_4" data-ancla="4" /><br>
                            <input type="text" class="total_Xj,k2" disabled /><br>
                            </span>
                            </td>

                             <!-- Sigma -->
                            <td>
                            <span class="disabled">
                            <input type="text" class="sigma" data-ancla="1" /><br>
                            <input type="text" class="sigma" data-ancla="2" /><br>
                            <input type="text" class="sigma" data-ancla="3" /><br>
                            <input type="text" class="sigma" data-ancla="4" /><br>
                            <input type="text" class="total_sigma" disabled /><br>
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

$(document).on("keyup", ".Xj1, .Xj2", function(evt){



});

</script>
@endpush

<!-- <div class="col-sm-12 col-lg-12">
    <button type="submit" class="btn btn-lg my-4 btn-primary font-weight-bold">Guardar</button>
</div> -->