<?php
	$message =
	'<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

		<style media="screen">
			.headerMine{
				height: 100px;
				width: 100%;
				background-color: #149b5a;
			}
			.principal{
				margin-top: 50px;
				margin-bottom: 50px;
			}
			.footerMine{
				height: 200px;
				width: 100%;
				background-color: #236483;
			}
			.contenido{
				font-size: 2em;
			}
			.btn-mine{
				padding: 10px 10px 10px 10px;
				border: 2px solid black;
				background-color: rgba(72, 189, 17, 0.62);
				border-radius: 5px 1px 1px 1px;
				color: black;
				text-align: center;
				margin-top: 20px;
				margin-bottom: 20px;
				font-size: 1.5em;
			}
			.btn-mine:hover{
				background-color: rgba(38, 129, 251, 0.6);
			}
			h6{
				text-align: center;
				font-size: 2em;
			}
			a.btn-mine{
				margin-left: auto;
				margin-right: auto;
				display: block;
			}
			img{
				margin-left: auto;
				margin-right: auto;
				display: block;
			}
		</style>
	</head>

	<body>
		<main>
			<div class="headerMine">

			</div>
			<div class="container principal">
				<h2>Hola '.$u1->username.',</h2>
				<p class="contenido">
					El siguiente mensaje es para notificarte que uno de tus productos fue elegido para hacer un truque,
					ve a la plataforma inicia sesión y hecha un vistazo a tu historial de trueques con lo ocurrido</p>
					<b>Detalles</b><br>
					<p>
						Producto: '.$pd1->nombre.' <br>
						Usuario que ofrecio: '.$u2->username.' <br>
						Producto que ofrecio: <a style="color: black" href="/productoEspecifico/'.$pd2->id.'">'.$pd2->nombre.'</a> <br>
					</p>
					<h5><b>Atentamente: Equipo de soporte de Rótalo</b></h5>
					<br>
				<h6>Haz Click para iniciar sesión</h6>
				<a href="http://rotalo.online/inicio" class="btn-mine">Iniciar sesión</a>
				<img src="https://preview.ibb.co/cMkgVk/logo_Rotalo.png" class="responsive-img" alt="">
			</div>
			<div class="footerMine">

			</div>
		</main>
	</body>

	</html>';
?>
