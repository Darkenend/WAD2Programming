<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Formulario de login</title>
	<!-- inclusión ficheros de JavaScript -->
	<script type="text/javascript" src="js/cargarDatos.js"></script>
	<script type="text/javascript" src="js/sesion.js"></script>
</head>

<body>
<section id="login">
	<!-- envío formulario asociado a la función de JavaScript login() --> 
	<form onsubmit="return login();" method="post">
		<!-- los campos del formulario tienen id en lugar de name para uso en JavaScript -->
		Usuario <input id="usuario" name="usuario" type="text">
		Clave <input id="clave" name="clave" type="password">
		<input type="submit">
	</form>
</section>
<!-- la sección con id principal comienza oculta -->
<section id="principal" style="display:none">
	<header>
		<?php
		require 'cabeceraJSON.php';
		?>
	</header>
	<h2 id="titulo"></h2>
	<!-- 
		<section id="carrito"></section>

		Seccion de carrito permanente debajo del titulo para que se vea correctamente
	-->
	<section id="contenido"></section>
</section>


</body>
</html>
