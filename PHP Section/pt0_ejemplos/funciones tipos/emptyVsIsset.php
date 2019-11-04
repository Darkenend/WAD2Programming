<!DOCTYPE html>
<html>
<head>
	<title>Función empty VS isset</title>
</head>

<body>
<table>
<tr><th>$a</th><th>empty($a)</th><th>isset($a)</th></tr>
<?php
/*
 * NOTA: en pantalla true sale como 1 y false no sale
 * Se puede arreglar con algo tipo:
 * (empty($a)?"true":"false")
 * (isset($a)?"true":"false")
 */
$a = ""; //cadena vacía
echo '<tr>';
echo '<td>' . '""' . '</td>';
echo '<td>' . empty($a) . '</td>';
echo '<td>' . isset($a) . '</td>';
echo '</tr>';
$a = 0; //integer
echo '<tr>';
echo '<td>' . '0' . '</td>';
echo '<td>' . empty($a) . '</td>';
echo '<td>' . isset($a) . '</td>';
echo '</tr>';
$a = 0.0; //float
echo '<tr>';
echo '<td>' . '0.0' . '</td>';
echo '<td>' . empty($a) . '</td>';
echo '<td>' . isset($a) . '</td>';
echo '</tr>';
$a = "0"; //string
echo '<tr>';
echo '<td>' . '"0"' . '</td>';
echo '<td>' . empty($a) . '</td>';
echo '<td>' . isset($a) . '</td>';
echo '</tr>';
$a = NULL;
echo '<tr>';
echo '<td>' . 'NULL' . '</td>';
echo '<td>' . empty($a) . '</td>';
echo '<td>' . isset($a) . '</td>';
echo '</tr>';
$a = false;
echo '<tr>';
echo '<td>' . 'FALSE' . '</td>';
echo '<td>' . empty($a) . '</td>';
echo '<td>' . isset($a) . '</td>';
echo '</tr>';
$a = array(); //array vacío
echo '<tr>';
echo '<td>' . 'array()' . '</td>';
echo '<td>' . empty($a) . '</td>';
echo '<td>' . isset($a) . '</td>';
echo '</tr>';
unset($a);
echo '<tr>';
echo '<td>' . 'unset($a)' . '</td>';
echo '<td>' . empty($a) . '</td>';
echo '<td>' . isset($a) . '</td>';
echo '</tr>';
$a; //declarada sin valor
echo '<tr>';
echo '<td>' . '$a' . '</td>';
echo '<td>' . empty($a) . '</td>';
echo '<td>' . isset($a) . '</td>';
echo '</tr>';
?>
</table>
</body>
</html>
