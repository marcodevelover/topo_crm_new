$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

async function postData(url = '', data = {}) {
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            // 'Content-Type': 'application/json'
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: JSON.stringify(data)
    });
    return response.json(); // parses JSON response into native JavaScript objects
}

const template = (item) => {
    return `
        <tr>
            <td><div class="btn btn-primary" data-item='${JSON.stringify(item)}'}>Seleccionar</td>
            <td>${item.name}</td>
            <td>${item.customer.rfc}</td>
            <td>${item.customer.business_name}</td>
        </tr>
    `
}
const templateProduct = (item) => {
    // <td>${item.name}</td>
    return `
        <tr>
            <td><div class="btn btn-primary" data-item='${JSON.stringify(item)}'}><i class="mdi mdi-plus-circle-outline"></i></td>
            <td>${item.model}</td>
            <td>${item.brand}</td>
            <td>${item.name}</td>
        </tr>
    `
}

$('#results').on('click','.btn.btn-primary', function(){
    const item = $(this).data('item');
    $('#staticNombre').val( item.name );
    const address = `Calle ${item.address.number} ${item.address.crossing} ${item.address.colony} `;
    $('#staticAddress').val( address );
    $('#staticEmail').val( item.email );
    $('#staticPhone').val( item.cellphone );
    $('#closeMC').trigger('click');
});

$('#productResults').on('click','.btn.btn-primary', function(){
    const item = $(this).data('item');
    $('#productName').val( item.name );
    $('#producBrand').val( item.brand );
    $('#producModel').val( item.model );
    $('#producNoSerie').val( 'no serie' );
    $('#closeMP').trigger('click');
});

$('#searchCustomer').submit(function(e){
    e.preventDefault();
    $('#results').html("");
    $('#loader').show();
    let arg = $(this).serializeArray();
    const url = 'https://toposervis.com.mx/reportes/searchCustomer';

    postData( url, { param: arg[0].value })
    .then(data => {
        data.forEach(item=>{
            $('#results').append(template(item));
        });
        $('#loader').fadeOut();
    });
});

$('#searchProduct').submit(function(e){
    e.preventDefault();
    $('#productResults').html("");
    $('#loader').show();
    let form = $(this).serializeObject();
    const url = 'https://toposervis.com.mx/reportes/searchProduct';

    postData( url, form )
    .then(data => {
        data.forEach(item=>{
            $('#productResults').append(templateProduct(item));
        });
        $('#loader').fadeOut();
    });
});

function formatNum(amount, decimals) {
	amount += ''; // por si pasan un numero en vez de un string
	amount = parseFloat(amount.replace(/[^0-9.]/g, '')); // elimino cualquier cosa que no sea numero o punto
	decimals = decimals || 0; // por si la variable no fue fue pasada
	// si no es un numero o es igual a cero retorno el mismo cero
	if (isNaN(amount) || amount === 0){
	   	return parseFloat(0).toFixed(decimals);
	}
	// si es mayor o menor que cero retorno el valor formateado como numero
	amount = '' + amount.toFixed(decimals);
	var amount_parts = amount.split('.'),
	regexp = /(\d+)(\d{3})/;

	while (regexp.test(amount_parts[0])){
		amount_parts[0] = amount_parts[0].replace(regexp, '$1,$2');
	}
	return amount_parts.join('.');
}

function formula1(parent, arg1, arg2, dj ){
    const result = $(parent).find(arg1).val() - $(parent).find(arg2).val();
    $(parent).find(dj).val(result);
}
function columdj(colum, total1, promedio, columrj1, columnr2j1, sumcuadrado){
    const dj1s = $(colum);
    const rj1s = $(columrj1);
    const r2j1s = $(columnr2j1);
    let _sumcuadrado = 0;
    let total = 0;
    for (let x = 0; x < $(dj1s).length; x++ ){
        total = total + Number( $(dj1s[x]).val() );
    };
    const _promedio = total / 20;
    
    $(promedio).html(_promedio);
    $(total1).html(total);

    let item = 0, alcuadrado = 0;
    for (let y = 0; y < $(rj1s).length; y++ ){
        
        item = _promedio - Number( $(dj1s[y]).val() );
        item = formatNum(item, 1);
        $(rj1s[y]).val(item);
        
        alcuadrado = item * item;
        alcuadrado = formatNum(alcuadrado, 2);
        $(r2j1s[y]).val( alcuadrado );
        _sumcuadrado = Number(_sumcuadrado) + Number(alcuadrado);
    }
    _sumcuadrado = formatNum(_sumcuadrado,2 );
    $(sumcuadrado).html(_sumcuadrado);

    const sumCuadrado = Number( $('#sumcuadrado1').html() ) + Number( $('#sumcuadrado2').html() );
    $('#sumatoriarj2').html(sumCuadrado);

    let ese = Math.sqrt( (sumCuadrado / 38 ) );
    ese = formatNum(ese, 2);
    $('#ese').html(ese);
    const sisolev = ese * 2.89;
    $('#sisolev').html( formatNum(sisolev,2 ));
    $('#input_sisolev').val( formatNum(sisolev,2 ) );
}

$('#reportMedicion').on('keyup change','input',function(){
  let $tr = $(this).parents('tr');

  let className = $(this).attr('class');

  let $input1 = $tr.find(".input1").first();

  let $dist1 = $tr.find(".dist1").first();
  let $dist2 = $tr.find(".dist2").first();
  let $dist3 = $tr.find(".dist3").first();

  let dDist1 = get_numeric($dist1.val());
  let dDist2 = get_numeric($dist2.val());
  let dDist3 = get_numeric($dist3.val());

  let dPromedio = 0;
  let iAux = 0;

  if(dDist1 > 0) ++iAux;
  if(dDist2 > 0) ++iAux;
  if(dDist3 > 0) ++iAux;

  dPromedio = (dDist1 + dDist2 + dDist3) / iAux;

  $input1.val(number_truncate(dPromedio));


  if( className == 'form-control input1' || className == 'form-control input2' )
  {
    formula1( $tr, '.input1', '.input2', '.dj1');
    columdj('.dj1.form-control', '#total1', '#promedio1','.rj1.form-control','.r2j1.form-control','#sumcuadrado1');
  }

  if( className == 'form-control input3' || className == 'form-control input4' )
  {
    formula1( $trº, '.input3', '.input4', '.dj2');
    columdj('.dj2.form-control', '#total2', '#promedio2', '.rj2.form-control','.r2j2.form-control','#sumcuadrado2');
  }
})

$('#auxsigned').click(function(){
    $('#signed').trigger('click');
});
