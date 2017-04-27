/*
* funcion de onload de la página que inicializa todos los objetos de materialize de javascript
*/
//var json;
$(document).ready(function(){
	// var str = $('.productos').text();
	// var p = JSON.stringify(eval("("+str+")"));
	 $('.change').fadeTo(2000, 1);
	 $('.nChange').fadeTo(2000, 1);
	 $('.parallax').parallax();
	 $(".button-collapse").sideNav();
	 $('.modal').modal();
	 $('.dropdown-button').dropdown({
		 hover: true, // Activate on hover
		 belowOrigin: true, // Displays dropdown below the button
 	 });
	//  p = JSON.parse(str);
	//  console.log(p);
	//  json = p;
	//  for (var i = 0; i < p.length; i++) {
	// 	 var btn = "" + p[i].id + "";
	// 	 console.log(btn);
	// 	 $("#btnfile" + i).click(function () {
	// 		 $("#cFotoP" + i).click();
	// 	 });
	//  }
	 $("#btnfile").click(function () {
		 $("#cFotoP").click();
	 });
});

/*
* Función que arroja una alrta cuando es invocada, po lo geneal se utiliza para cerrar sesión
*/
function mensajeSesion(mensaje){
	alert(mensaje);
	console.log("cerró sesión");
}
