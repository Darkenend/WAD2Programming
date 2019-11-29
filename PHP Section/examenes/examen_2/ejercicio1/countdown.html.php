<?php
require_once 'countdown.php';
if (isset($_POST['current'])) {
	$current = countdownHandling($_POST['current']);
} else {
	$current = 10;
}
$printed = 0;
if ($current == 0) {
	$mensaje = "¡La cuenta atrás ha terminado! ¡Va a estallar el obús!";
} else {
	$mensaje = $current." segundos para detonación.";
}
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
				<tr>
				<!-- código a modificar libremente -->
					<?php
					for ($i = 0; $i < 10; $i++) {
						if ($printed != $current) {
							echo '<td align="center"><img src="imagenes/bola.png"></td>';
							$printed++;
						} else {
							echo '<td align="center"><img src="imagenes/vacia.png"></td>';
						}
					}
					?>
				<!-- código a modificar libremente -->	
				</tr>
				<tr>
					<td align="center" colspan=10>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
						<input type="submit" value="Cuenta atrás">
						<input type="hidden" name="current" value="<?php echo $current; ?>">
                    </form>
					</td>
				</tr>
				<tr>
					<td align="center" colspan=10><?php echo $mensaje ?></td>
				</tr>
				<tr>
					<td align="center" colspan=10>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
						<input type="submit" value="Resetear Cuenta Atrás">
						<input type="hidden" name="current" value="11">
					</form>
					</td>
				</tr>
			</table>
		</div><!-- end content -->
	</div><!-- end outer -->
	</div><!-- end container -->
</body>
</html>