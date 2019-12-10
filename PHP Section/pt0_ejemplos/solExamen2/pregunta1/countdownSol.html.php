<?php
require_once 'countdown.php';
?>
<html >
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Ejercicio 1 (cuenta atrás)</title>
	<style>
		table,th,td {
			border:1px solid black;
		}
		form {
			display: inline;
			vertical-align: middle;
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
                    <?php for($i = 0; $i < 10; $i++) {?>                
					    <TD align="center"><img src="<?php echo ($i<$_SESSION['bolas'])?'imagenes/bola.png':'imagenes/vacia.png'; ?>"></TD>
                    <?php } ?>
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
			<a href="countdownSol.html.php?comenzar=yes">comenzar de nuevo</a> 
		</div><!-- end content -->
	</div><!-- end outer -->
	</div><!-- end container -->
</body>
</html>