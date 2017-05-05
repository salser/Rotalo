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
			else if ($( this ).val() === "Tablets-Teléfonos") {
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
	$('.catedit'+c.id_producto).empty();
	if (c.nombre_cat === "Electrodomésticos") {
		str =
		"<div class='input-field col offset-l1 s12 m6 l5'>"+
			 "<input type='text' name='marcaM"+ c.id_producto + "' id='marcaM"+ c.id_producto +"' value='"+ c.marca +"'>"+
				"<label class='active' for='marcaM"+ c.id_producto +"'>Marca</label>"+
		"</div>" +
		"<div class='input-field col s12 m6 l5'>"+
			 "<input type='text' name='tipoM"+ c.id_producto + "' id='tipoM"+ c.id_producto +"' value='"+ c.tipo +"'>"+
				"<label class='active' for='tipoM"+ c.id_producto +"'>Tipo</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Vehículos") {
		str =
		"<div class='input-field col offset-l1 s12 m6 l3'>"+
			 "<input type='text' name='placaM"+ c.id_producto + "' id='placaM"+ c.id_producto +"' value='"+ c.placa +"'>"+
				"<label class='active' for='placaM"+ c.id_producto +"'>Placa</label>"+
		"</div>" +
		"<div class='input-field col s12 m6 l3'>"+
			 "<input type='number' name='modeloM"+ c.id_producto + "' id='modeloM"+ c.id_producto +"' value='"+ c.modelo +"'>"+
				"<label class='active' for='modeloM"+ c.id_producto +"'>Modelo</label>"+
		"</div>"+
		"<div class='input-field col s12 m6 l4'>"+
			 "<input type='text' name='marcaM"+ c.id_producto + "' id='marcaM"+ c.id_producto +"' value='"+ c.marca +"'>"+
			 "<label class='active' for='marcaM"+ c.id_producto +"'>Marca</label>"+
		"</div>"+
		"<div class='input-field col offset-l1 s12 m6 l3'>"+
			 "<input type='number' name='kmM"+ c.id_producto + "' id='kmM"+ c.id_producto +"' value='"+ c.km +"'>"+
				"<label class='active' for='kmM"+ c.id_producto +"'>Kilometraje</label>"+
		"</div>"+
		"<div class='input-field col s12 m6 l3'>"+
			 "Color:<input type='color' name='colorM"+ c.id_producto + "' id='colorM"+ c.id_producto +"' value='"+ c.color +"'>"+
		"</div>"+
		"<div class='input-field col s12 m6 l4'>"+
			"<select class='comb' name='combM"+ c.id_producto + "' id='combM"+ c.id_producto +"'>";
			if (c.comb === 'Gasolina'){
				str = str +
				"<option value='' disabled selected>Choose your option</option>"+
				"<option value='Gasolina' selected='selected'>Gasolina</option>"+
				"<option value='Gas'>Gas</option>"+
				"<option value='Diesel'>Diesel</option>"+
				"<option value='ACPM'>ACPM</option>"+
				"</select>"+
				"<label>Combustible</label>"+
				"</div>";
			}else if (c.comb === 'Gas') {
				str = str +
				"<option value='' disabled selected>Choose your option</option>"+
				"<option value='Gasolina'>Gasolina</option>"+
				"<option value='Gas' selected='selected'>Gas</option>"+
				"<option value='Diesel'>Diesel</option>"+
				"<option value='ACPM'>ACPM</option>"+
				"</select>"+
				"<label>Combustible</label>"+
				"</div>";
			} else if (c.comb === 'Diesel') {
				str = str +
				"<option value='' disabled selected>Choose your option</option>"+
				"<option value='Gasolina'>Gasolina</option>"+
				"<option value='Gas'>Gas</option>"+
				"<option value='Diesel' selected='selected'>Diesel</option>"+
				"<option value='ACPM'>ACPM</option>"+
				"</select>"+
				"<label>Combustible</label>"+
				"</div>";
			}else if (c.comb === 'ACPM') {
				str = str +
				"<option value='' disabled selected>Choose your option</option>"+
				"<option value='Gasolina'>Gasolina</option>"+
				"<option value='Gas'>Gas</option>"+
				"<option value='Diesel'>Diesel</option>"+
				"<option value='ACPM' selected='selected'>ACPM</option>"+
				"</select>"+
				"<label>Combustible</label>"+
				"</div>";
			}
	}
	else if (c.nombre_cat === "Literatura") {
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			 "<input type='number' name='edicionM"+ c.id_producto + "' id='edicionM"+ c.id_producto +"' value='"+ c.edicion +"'>"+
				"<label class='active' for='edicionM"+ c.id_producto +"'>Edición</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			 "<input type='text' name='editorialM"+ c.id_producto + "' id='editorialM"+ c.id_producto +"' value='"+ c.editorial +"'>"+
				"<label class='active' for='editorialM"+ c.id_producto +"'>Editorial</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			 "<input type='text' name='autorM"+ c.id_producto + "' id='autorM"+ c.id_producto +"' value='"+ c.autor +"'>"+
				"<label class='active' for='autorM"+ c.id_producto +"'>Autor</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Arte") {
		str=
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			 "<input type='number' name='anioM"+ c.id_producto + "' id='anioM"+ c.id_producto +"' value='"+ c.año +"'>"+
				"<label class='active' for='anioM"+ c.id_producto +"'>Año</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			 "<input type='text' name='tipoM"+ c.id_producto + "' id='tipoM"+ c.id_producto +"' value='"+ c.tipo +"'>"+
				"<label class='active' for='tipoM"+ c.id_producto +"'>Tipo</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			 "<input type='text' name='autorM"+ c.id_producto + "' id='autorM"+ c.id_producto +"' value='"+ c.autor +"'>"+
				"<label class='active' for='autorM"+ c.id_producto +"'>Autor</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Música") {
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			"<input type='text' name='albumM"+ c.id_producto + "' id='albumM"+ c.id_producto +"' value='"+ c.album +"'>"+
			"<label class='active' for='albumM"+ c.id_producto +"'>Album</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='generoM"+ c.id_producto + "' id='generoM"+ c.id_producto +"' value='"+ c.genero +"'>"+
			"<label class='active' for='generoM"+ c.id_producto +"'>Género</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='autorM"+ c.id_producto + "' id='autorM"+ c.id_producto +"' value='"+ c.autor +"'>"+
			"<label class='active' for='autorM"+ c.id_producto +"'>Autor</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Inmuebles") {
		str =
		"<div class='input-field col offset-l1 s12 m12 l5'>"+
			"<input type='text' name='dirM"+ c.id_producto + "' id='dirM"+ c.id_producto +"' value='"+ c.direccion +"'>"+
			"<label class='active' for='dirM"+ c.id_producto +"'>Dirección</label>"+
		"</div>"+
		"<div class='input-field col s12 m6 l5'>"+
			"<input type='number' name='banoM"+ c.id_producto + "' id='banoM"+ c.id_producto +"' value='"+ c.bano +"'>"+
			"<label class='active' for='banoM"+ c.id_producto +"'>#Baños</label>"+
		"</div>"+
		"<div class='input-field col offset-l1 s12 m12 l5'>"+
			"<input type='number' name='roomM"+ c.id_producto + "' id='roomM"+ c.id_producto +"' value='"+ c.alcobas +"'>"+
			"<label class='active' for='roomM"+ c.id_producto +"'>#Alcobas</label>"+
		"</div>"+
		"<div class='input-field col s12 m12 l5'>"+
			"<input type='number' name='anioM"+ c.id_producto + "' id='anioM"+ c.id_producto +"' value='"+ c.año +"'>"+
			"<label class='active' for='anioM"+ c.id_producto +"'>Año</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Tablets-Teléfonos") {
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			"<input type='text' name='marcaM"+ c.id_producto + "' id='marcaM"+ c.id_producto +"' value='"+ c.marca +"'>"+
			"<label class='active' for='marcaM"+ c.id_producto +"'>Marca</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='osM"+ c.id_producto + "' id='osM"+ c.id_producto +"' value='"+ c.os +"'>"+
			"<label class='active' for='osM"+ c.id_producto +"'>Sistema Operativo</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='referenciaM"+ c.id_producto + "' id='referenciaM"+ c.id_producto +"' value='"+ c.referencia +"'>"+
			"<label class='active' for='referenciaM"+ c.id_producto +"'>Referencia</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Computadores") {
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			"<input type='text' name='marcaM"+ c.id_producto + "' id='marcaM"+ c.id_producto +"' value='"+ c.marca +"'>"+
			"<label class='active' for='marcaM"+ c.id_producto +"'>Marca</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='osM"+ c.id_producto + "' id='osM"+ c.id_producto +"' value='"+ c.os +"'>"+
			"<label class='active' for='osM"+ c.id_producto +"'>Sistema Operativo</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='referenciaM"+ c.id_producto + "' id='referenciaM"+ c.id_producto +"' value='"+ c.referencia +"'>"+
			"<label class='active' for='referenciaM"+ c.id_producto +"'>Referencia</label>"+
		"</div>";
	}
	else if (c.nombre_cat === "Consolas de Vidéo Juegos") {
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			"<input type='text' name='marcaM"+ c.id_producto + "' id='marcaM"+ c.id_producto +"' value='"+ c.marca +"'>"+
			"<label class='active' for='marcaM"+ c.id_producto +"'>Marca</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='storageM"+ c.id_producto + "' id='storageM"+ c.id_producto +"' value='"+ c.almacenamiento +"'>"+
			"<label class='active' for='storageM"+ c.id_producto +"'>Almacenamiento</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='referenciaM"+ c.id_producto + "' id='referenciaM"+ c.id_producto +"' value='"+ c.referencia +"'>"+
			"<label class='active' for='referenciaM"+ c.id_producto +"'>Referencia</label>"+
		"</div>";
	}
// console.log(str);
$( ".catedit"+c.id_producto ).append( str );
$('select').material_select();
}

function cambioCategoria(p){
	var c = $('.selectCatEdit'+p).find(':selected').text();
	if (c === "Electrodomésticos") {
		$( ".cambioCat"+p ).empty();
		str =
		"<div class='input-field col offset-l1 s12 m6 l5'>"+
			 "<input type='text' name='marcaC"+ p +"' id='marcaC"+ p +"'>"+
				"<label for='marcaC"+ p +"'>Marca</label>"+
		"</div>" +
		"<div class='input-field col s12 m6 l5'>"+
			 "<input type='text' name='tipoC"+ p +"' id='tipoC"+ p +"'>"+
				"<label for='tipoC"+ p +"'>Tipo</label>"+
		"</div>";
	}
	else if (c === "Vehículos") {
		$( ".cambioCat"+p ).empty();
		str =
		"<div class='input-field col offset-l1 s12 m6 l3'>"+
			 "<input type='text' name='placaC"+ p +"' id='placaC"+ p +"'>"+
				"<label for='placaC"+ p +"'>Placa</label>"+
		"</div>" +
		"<div class='input-field col s12 m6 l3'>"+
			 "<input type='number' name='modeloC"+ p +"' id='modeloC"+ p +"'>"+
				"<label for='modeloC"+ p +"'>Modelo</label>"+
		"</div>"+
		"<div class='input-field col s12 m6 l4'>"+
			 "<input type='text' name='marcaC"+ p +"' id='marcaC"+ p +"'>"+
			 "<label for='marcaC"+ p +"'>Marca</label>"+
		"</div>"+
		"<div class='input-field col offset-l1 s12 m6 l3'>"+
			 "<input type='number' name='km"+ p +"' id='km"+ p +"'>"+
				"<label for='km"+ p +"'>Kilometraje</label>"+
		"</div>"+
		"<div class='input-field col s12 m6 l3'>"+
			 "Color:<input type='color' name='colorC"+ p +"' id='colorC"+ p +"' value='#33ff00'>"+
		"</div>"+
		"<div class='input-field col s12 m6 l4'>"+
			"<select class='comb' name='combC"+ p +"' id='combC"+ p +"'>"+
				"<option value='' disabled selected>Choose your option</option>"+
				"<option value='Gasolina'>Gasolina</option>"+
				"<option value='Gas'>Gas</option>"+
				"<option value='Diesel'>Diesel</option>"+
				"<option value='ACPM'>ACPM</option>"+
			"</select>"+
			"<label>Combustible</label>"+
		"</div>";
	}
	else if (c === "Literatura") {
		$( ".cambioCat"+p ).empty();
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			 "<input type='number' name='edicionC"+ p +"' id='edicionC"+ p +"'>"+
				"<label for='edicionC"+ p +"'>Edición</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			 "<input type='text' name='editorialC"+ p +"' id='editorialC"+ p +"'>"+
				"<label for='editorialC"+ p +"'>Editorial</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			 "<input type='text' name='autorC"+ p +"' id='autorC"+ p +"'>"+
				"<label for='autorC"+ p +"'>Autor</label>"+
		"</div>";
	}
	else if (c === "Arte") {
		$( ".cambioCat"+p ).empty();
		str=
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			 "<input type='number' name='anioC"+ p +"' id='anioC"+ p +"'>"+
				"<label for='anioC"+ p +"'>Año</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			 "<input type='text' name='tipoC"+ p +"' id='tipoC"+ p +"'>"+
				"<label for='tipoC"+ p +"'>Tipo</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			 "<input type='text' name='autorC"+ p +"' id='autorC"+ p +"'>"+
				"<label for='autorC"+ p +"'>Autor</label>"+
		"</div>";
	}
	else if (c === "Música") {
		$( ".cambioCat"+p ).empty();
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			"<input type='text' name='albCum"+ p +"' id='album"+ p +"'>"+
			"<label for='album"+ p +"'>Album</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='generoC"+ p +"' id='generoC"+ p +"'>"+
			"<label for='generoC"+ p +"'>Género</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='autorC"+ p +"' id='autorC"+ p +"'>"+
			"<label for='autorC"+ p +"'>Autor</label>"+
		"</div>";
	}
	else if (c === "Inmuebles") {
		$( ".cambioCat"+p ).empty();
		str =
		"<div class='input-field col offset-l1 s12 m12 l5'>"+
			"<input type='text' name='dirC"+ p +"' id='dirC"+ p +"'>"+
			"<label for='dirC"+ p +"'>Dirección</label>"+
		"</div>"+
		"<div class='input-field col s12 m6 l5'>"+
			"<input type='number' name='banoC"+ p +"' id='banoC"+ p +"'>"+
			"<label for='banoC"+ p +"'>#Baños</label>"+
		"</div>"+
		"<div class='input-field col offset-l1 s12 m12 l5'>"+
			"<input type='number' name='roomC"+ p +"' id='roomC"+ p +"'>"+
			"<label for='roomC"+ p +"'>#Alcobas</label>"+
		"</div>"+
		"<div class='input-field col s12 m12 l5'>"+
			"<input type='number' name='anioC"+ p +"' id='anioC"+ p +"'>"+
			"<label for='anioC"+ p +"'>Año</label>"+
		"</div>";
	}
	else if (c === "Tablets-Teléfonos") {
		$( ".cambioCat"+p ).empty();
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			"<input type='text' name='marcaC"+ p +"' id='marcaC"+ p +"'>"+
			"<label for='marcaC"+ p +"'>Marca</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='osC"+ p +"' id='osC"+ p +"'>"+
			"<label for='osC"+ p +"'>Sistema Operativo</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='referenciaC"+ p +"' id='referenciaC"+ p +"'>"+
			"<label for='referenciaC"+ p +"'>Referencia</label>"+
		"</div>";
	}
	else if (c === "Computadores") {
		$( ".cambioCat"+p ).empty();
		str =
		"<div class='input-field col offset-l1 s12 m4 l3'>"+
			"<input type='text' name='marcaC"+ p +"' id='marcaC"+ p +"'>"+
			"<label for='marcaC"+ p +"'>Marca</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='osC"+ p +"' id='osC"+ p +"'>"+
			"<label for='osC"+ p +"'>Sistema Operativo</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='referenciaC"+ p +"' id='referenciaC"+ p +"'>"+
			"<label for='referenciaC"+ p +"'>Referencia</label>"+
		"</div>";
	}
	else if (c === "Consolas de Vidéo Juegos") {
		$( ".cambioCat"+p ).empty();
		str =
		"<div class='input-field offset-l1 col s12 m4 l3'>"+
			"<input type='text' name='marcaC"+ p +"' id='marcaC"+ p +"'>"+
			"<label for='marcaC"+ p +"'>Marca</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l3'>"+
			"<input type='text' name='storageC"+ p +"' id='storageC"+ p +"'>"+
			"<label for='storageC"+ p +"'>Almacenamiento</label>"+
		"</div>"+
		"<div class='input-field col s12 m4 l4'>"+
			"<input type='text' name='referenciaC"+ p +"' id='referenciaC"+ p +"'>"+
			"<label for='referenciaC"+ p +"'>Referencia</label>"+
		"</div>";
	}
	$( ".cambioCat"+p ).append( str );
	// console.log($('.cambioCat'+p).text());
	$('select').material_select();
}
