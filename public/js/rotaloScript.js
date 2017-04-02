/*
* funcion de onload de la página que inicializa todos los objetos de materialize de javascript
*/
$(document).ready(function(){
		 $('.parallax').parallax();
		 $(".button-collapse").sideNav();
		 $('.dropdown-button').dropdown({
			 hover: true, // Activate on hover
			 belowOrigin: true, // Displays dropdown below the button
			 width: 100
	 }
 );
	 });

/*
* Función que arroja una alrta cuando es invocada, po lo geneal se utiliza para cerrar sesión
*/
function mensajeSesion(mensaje){
	alert(mensaje);
	console.log("cerró sesión");
}
