<?php
require_once 'countdown.php';
?>
<html >
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Ejercicio 1 (cuenta atrás)</title>
	<style>
		table,th,td
		{
			border:1px solid black;
		}
	</style>
</head>
<body>

	<div id="container" >
	<div id="banner" >
		<h2>DWES - Desarrollo Web en Entorno Servidor</h2>
		<h3>Examen de la 1ª evaluación (27 de noviembre)</h3>
	</div>
	<div id="outer" >
	   	<div id="content" >
			<table>
				<TR>
				<!-- código a modificar libremente -->
					<TD align="center"><img src="imagenes/bola.png"></TD>
					<TD align="center"><img src="imagenes/bola.png"></TD>
					<TD align="center"><img src="imagenes/bola.png"></TD>
					<TD align="center"><img src="imagenes/bola.png"></TD>
					<TD align="center"><img src="imagenes/bola.png"></TD>
					<TD align="center"><img src="imagenes/bola.png"></TD>
					<TD align="center"><img src="imagenes/bola.png"></TD>
					<TD align="center"><img src="imagenes/bola.png"></TD>
					<TD align="center"><img src="imagenes/bola.png"></TD>
					<TD align="center"><img src="imagenes/bola.png"></TD>
				<!-- código a modificar libremente -->	
				</TR>
				<TR>
					<TD align="center" colspan=10>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					    <INPUT type="submit" value="Cuenta atrás">
                    </form>
					</TD>
				</TR>
				<TR>
					<TD align="center" colspan=10><?php echo $mensaje ?></TD>
				</TR>
			</table>
			<!-- Aquí puede ir un enlace para resetear la cuenta -->
		</div><!-- end content -->
	</div><!-- end outer -->
	</div><!-- end container -->
</body>
</html>