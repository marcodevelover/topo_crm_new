<style>
    td.disabled{
        position: relative;
        cursor:no-drop;
        display:block;
    }
    
    td.disabled::before{
        content:"";
        top: 0;
        left: 0;
        width:100% ;
        height: 100%;
        position: absolute;
        z-index: 1;
        background-color: #444;
        opacity: 0.2;
    }
</style>
<div class="card my-2">
    <div class="card-header">
        <h5 class="my-1">Reporte de medición</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
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
                    <?php $index1 = 1; $index2 = 21; $count = 0; $contx = 0; ?>
                    @while( $count < 20 )
                    <tr id="row-{{ $index1 }}">
                        <td>{{ $index1++ }}</td>
                        <td><input type="text" class="form-control input1" name="xaj[]" value=""></td>
                        <td><input type="text" class="form-control input2" name="xbj[]" value=""></td>
                        <td>
                            <span class="disabled">
                                <input class="dj1 form-control" type="text" value="" disabled>
                                <input class="dj1" name="dj1[]" type="hidden" value="">
                            </span> 
                        </td>
                        <td>
                            <span class="disabled">
                                <input class="rj1 form-control" type="text" value="" disabled>
                                <input class="rj1" name="rj1[]" type="hidden" value="">
                            </span> 
                        </td>
                        <td>
                            <span class="disabled">
                                <input class="r2j1 form-control" type="text" value="" disabled> 
                                <input class="r2j1" name="r2j1[]" type="hidden" value="">
                            </span> 
                        </td>
                        
                        <td>{{ $index2++ }}</td>
                        <td><input type="text" class="form-control input3" name="xaj2[]" value=""></td>
                        <td><input type="text" class="form-control input4" name="xbj2[]" value=""></td>
                        <td>
                            <span class="disabled">
                                <input type="text" class="form-control dj2" value="" disabled>
                                <input class="dj2" type="hidden" name="dj2[]" value="">
                            </span>
                        </td>
                        <td>
                            <span class="disabled">
                                <input type="text" class="form-control rj2" value="" disabled>
                                <input class="rj2" type="hidden" name="rj2[]" value="">
                            </span> 
                        </td>
                        <td>
                            <span class="disabled">
                                <input type="text" class="form-control r2j2" value="" disabled>
                                <input class="2j2" type="hidden" name="r2j2[]" value="">
                            </span> 
                        </td>
                    </tr>
                    <?php $contx ++; $count ++;?> 
                    @endwhile
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span id="total1"></span></td>
                        <td></td>
                        <td><span id="sumcuadrado1"></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span id="total2"></span></td>
                        <td></td>
                        <td><span id="sumcuadrado2"></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>d1=</td>
                        <td> <span id="promedio1"></span> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>d2=</td>
                        <td> <span id="promedio2"></span></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Σrj2= <span id="sumatoriarj2"></span></td>
                        <td>s = <span id="ese"></span></td>
                        <td></td>
                        <td></td>
                        <td>sisolev=</td>
                        <td> <span id="sisolev"></span></td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>