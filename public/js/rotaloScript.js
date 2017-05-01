/*
* funcion de onload de la página que inicializa todos los objetos de materialize de javascript
*/
var json;
$(document).ready(function(){
	// var str = $('.productos').text();
	// var p = JSON.stringify(eval("("+str+")"));
	//  p = JSON.parse(str);
	 $('.change').fadeTo(2000, 1);
	 $('.nChange').fadeTo(2000, 1);
	 $('.parallax').parallax();
	 $(".button-collapse").sideNav();
	 $('.modal').modal();
	 $('.dropdown-button').dropdown({
		 hover: true, // Activate on hover
		 belowOrigin: true, // Displays dropdown below the button
 	 });
	 $('select').material_select();
	//  $('div[class^="btnfile"]').click(function () {
	// 	 $('input[class^="cFotoP"]').click();
	//  });
	$( "select.selectCat" )
	.change(function () {
		var str = "";
		$( "select.selectCat option:selected" ).each(function() {
			$('.cat').empty();
			if ($( this ).val() === "Electrodomésticos") {
				str =
				"<div class='input-field col offset-l1 s12 m6 l5'>"+
           "<input type='text' name='marca' id='marca'>"+
            "<label for='marca'>Marca</label>"+
        "</div>" +
				"<div class='input-field col s12 m6 l5'>"+
           "<input type='text' name='tipo' id='tipo'>"+
            "<label for='tipo'>Tipo</label>"+
        "</div>";
			}
			else if ($( this ).val() === "Vehículos") {
				str =
				"<div class='input-field col offset-l1 s12 m6 l3'>"+
					 "<input type='text' name='placa' id='placa'>"+
						"<label for='placa'>Placa</label>"+
				"</div>" +
				"<div class='input-field col s12 m6 l3'>"+
					 "<input type='number' name='modelo' id='modelo'>"+
						"<label for='modelo'>Modelo</label>"+
				"</div>"+
				"<div class='input-field col s12 m6 l4'>"+
					 "<input type='text' name='marca' id='marca'>"+
					 "<label for='marca'>Marca</label>"+
				"</div>"+
				"<div class='input-field col offset-l1 s12 m6 l3'>"+
					 "<input type='number' name='km' id='km'>"+
						"<label for='km'>Kilometraje</label>"+
				"</div>"+
				"<div class='input-field col s12 m6 l3'>"+
					 "Color:<input type='color' name='color' id='color' value='#33ff00'>"+
				"</div>"+
				"<div class='input-field col s12 m6 l4'>"+
			    "<select class='comb' name='comb' id='comb'>"+
			      "<option value='' disabled selected>Choose your option</option>"+
			      "<option value='Gasolina'>Gasolina</option>"+
			      "<option value='Gas'>Gas</option>"+
			      "<option value='Diesel'>Diesel</option>"+
						"<option value='ACPM'>ACPM</option>"+
			    "</select>"+
			    "<label>Combustible</label>"+
			  "</div>";
			}
			else if ($( this ).val() === "Literatura") {
				str =
				"<div class='input-field col offset-l1 s12 m4 l3'>"+
					 "<input type='number' name='edicion' id='edicion'>"+
						"<label for='edicion'>Edición</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l3'>"+
					 "<input type='text' name='editorial' id='editorial'>"+
						"<label for='editorial'>Editorial</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l4'>"+
					 "<input type='text' name='autor' id='autor'>"+
						"<label for='autor'>Autor</label>"+
				"</div>";
			}
			else if ($( this ).val() === "Arte") {
				str=
				"<div class='input-field col offset-l1 s12 m4 l3'>"+
					 "<input type='number' name='anio' id='anio'>"+
						"<label for='anio'>Año</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l3'>"+
					 "<input type='text' name='tipo' id='tipo'>"+
						"<label for='tipo'>Tipo</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l4'>"+
					 "<input type='text' name='autor' id='autor'>"+
						"<label for='autor'>Autor</label>"+
				"</div>";
			}
			else if ($( this ).val() === "Música") {
				str =
				"<div class='input-field col offset-l1 s12 m4 l3'>"+
					"<input type='text' name='album' id='album'>"+
					"<label for='album'>Album</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l3'>"+
					"<input type='text' name='genero' id='genero'>"+
					"<label for='genero'>Género</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l4'>"+
					"<input type='text' name='autor' id='autor'>"+
					"<label for='autor'>Autor</label>"+
				"</div>";
			}
			else if ($( this ).val() === "Inmuebles") {
				str =
				"<div class='input-field col offset-l1 s12 m12 l5'>"+
					"<input type='text' name='dir' id='dir'>"+
					"<label for='dir'>Dirección</label>"+
				"</div>"+
				"<div class='input-field col s12 m6 l5'>"+
					"<input type='number' name='bano' id='bano'>"+
					"<label for='bano'>#Baños</label>"+
				"</div>"+
				"<div class='input-field col offset-l1 s12 m12 l5'>"+
					"<input type='number' name='room' id='room'>"+
					"<label for='room'>#Alcobas</label>"+
				"</div>"+
				"<div class='input-field col s12 m12 l5'>"+
					"<input type='number' name='anio' id='anio'>"+
					"<label for='anio'>Año</label>"+
				"</div>";
			}
			else if ($( this ).val() === "Tablets/Teléfonos") {
				str =
				"<div class='input-field col offset-l1 s12 m4 l3'>"+
					"<input type='text' name='marca' id='marca'>"+
					"<label for='marca'>Marca</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l3'>"+
					"<input type='text' name='os' id='os'>"+
					"<label for='os'>Sistema Operativo</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l4'>"+
					"<input type='text' name='referencia' id='referencia'>"+
					"<label for='referencia'>Referencia</label>"+
				"</div>";
			}
			else if ($( this ).val() === "Computadores") {
				str =
				"<div class='input-field col offset-l1 s12 m4 l3'>"+
					"<input type='text' name='marca' id='marca'>"+
					"<label for='marca'>Marca</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l3'>"+
					"<input type='text' name='os' id='os'>"+
					"<label for='os'>Sistema Operativo</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l4'>"+
					"<input type='text' name='referencia' id='referencia'>"+
					"<label for='referencia'>Referencia</label>"+
				"</div>";
			}
			else if ($( this ).val() === "Consolas de Vidéo Juegos") {
				str =
				"<div class='input-field offset-l1 col s12 m4 l3'>"+
					"<input type='text' name='marca' id='marca'>"+
					"<label for='marca'>Marca</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l3'>"+
					"<input type='text' name='storage' id='storage'>"+
					"<label for='storage'>Almacenamiento</label>"+
				"</div>"+
				"<div class='input-field col s12 m4 l4'>"+
					"<input type='text' name='referencia' id='referencia'>"+
					"<label for='referencia'>Referencia</label>"+
				"</div>";
			}

		});
		$( ".cat" ).append( str );
		$('select').material_select();
	})
	.change();
});
/*
* Función que arroja una alrta cuando es invocada, po lo geneal se utiliza para cerrar sesión
*/
function mensajeSesion(mensaje){
	alert(mensaje);
	console.log("cerró sesión");
}

function mostrarCat(c)
{
	//var cat = JSON.stringify(eval("("+c+")"));
	// c = JSON.parse(str);
	$('.catedit').empty();
	if (c.nombre_cat === "Electrodomésticos") {
		str =
		"<div class='input-field col offset-l1 s12 m6 l5'>"+
			 "<input type='text' name='marca' id='marca'>"+
				"<label for='marca'>Marca</label>"+
		"</div>" +
		"<div class='input-field col s12 m6 l5'>"+
			 "<input type='text' name='tipo' id='tipo'>"+
				"<label for='tipo'>Tipo</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Vehículos") {
		str =
		"<div class='input-field col offset-l1 s12 m6 l3'>"+
			 "<input type='text' name='placa' id='placa'>"+
				"<label for='placa'>Placa</label>"+
		"</div>" +
		"<div class='input-field col s12 m6 l3'>"+
			 "<input type='number' name='modelo' id='modelo'>"+
				"<label for='modelo'>Modelo</label>"+
		"</div>"+
		"<div class='input-field col s12 m6 l4'>"+
			 "<input type='text' name='marca' id='marca'>"+
			 "<label for='marca'>Marca</label>"+
		"</div>"+
		"<div class='input-field col offset-l1 s12 m6 l3'>"+
			 "<input type='number' name='km' id='km'>"+
				"<label for='km'>Kilometraje</label>"+
		"</div>"+
		"<div class='input-field col s12 m6 l3'>"+
			 "Color:<input type='color' name='color' id='color' value='#33ff00'>"+
		"</div>"+
		"<div class='input-field col s12 m6 l4'>"+
			"<select class='comb' name='comb' id='comb'>"+
				"<option value='' disabled selected>Choose your option</option>"+
				"<option value='Gasolina'>Gasolina</option>"+
				"<option value='Gas'>Gas</option>"+
				"<option value='Diesel'>Diesel</option>"+
				"<option value='ACPM'>ACPM</option>"+
			"</select>"+
			"<label>Combustible</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Literatura") {
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			 "<input type='number' name='edicion' id='edicion'>"+
				"<label for='edicion'>Edición</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			 "<input type='text' name='editorial' id='editorial'>"+
				"<label for='editorial'>Editorial</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			 "<input type='text' name='autor' id='autor'>"+
				"<label for='autor'>Autor</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Arte") {
		str=
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			 "<input type='number' name='anio' id='anio'>"+
				"<label for='anio'>Año</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			 "<input type='text' name='tipo' id='tipo'>"+
				"<label for='tipo'>Tipo</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			 "<input type='text' name='autor' id='autor'>"+
				"<label for='autor'>Autor</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Música") {
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			"<input type='text' name='album' id='album'>"+
			"<label for='album'>Album</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='genero' id='genero'>"+
			"<label for='genero'>Género</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='autor' id='autor'>"+
			"<label for='autor'>Autor</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Inmuebles") {
		str =
		"<div class='input-field col offset-l1 s12 m12 l5'>"+
			"<input type='text' name='dir' id='dir'>"+
			"<label for='dir'>Dirección</label>"+
		"</div>"+
		"<div class='input-field col s12 m6 l5'>"+
			"<input type='number' name='bano' id='bano'>"+
			"<label for='bano'>#Baños</label>"+
		"</div>"+
		"<div class='input-field col offset-l1 s12 m12 l5'>"+
			"<input type='number' name='room' id='room'>"+
			"<label for='room'>#Alcobas</label>"+
		"</div>"+
		"<div class='input-field col s12 m12 l5'>"+
			"<input type='number' name='anio' id='anio'>"+
			"<label for='anio'>Año</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Tablets/Teléfonos") {
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			"<input type='text' name='marca' id='marca'>"+
			"<label for='marca'>Marca</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='os' id='os'>"+
			"<label for='os'>Sistema Operativo</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='referencia' id='referencia'>"+
			"<label for='referencia'>Referencia</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Computadores") {
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			"<input type='text' name='marca' id='marca'>"+
			"<label for='marca'>Marca</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='os' id='os'>"+
			"<label for='os'>Sistema Operativo</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='referencia' id='referencia'>"+
			"<label for='referencia'>Referencia</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Consolas de Vidéo Juegos") {
		str =
		"<div class='input-field offset-l1 col s12 m4 l3'>"+
			"<input type='text' name='marca' id='marca'>"+
			"<label for='marca'>Marca</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='storage' id='storage'>"+
			"<label for='storage'>Almacenamiento</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='referencia' id='referencia'>"+
			"<label for='referencia'>Referencia</label>"+
		"</div>";
	}
console.log(str);
$( ".catedit"+c.id_producto ).append( str );
$('select').material_select();
}
