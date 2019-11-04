<!DOCTYPE html>

<html>
<head>
    <title>Arrays multidimensionales</title>
</head>
<body>
<?php
$pais = array(
  "españa" => array(
    "nombre" => "España",
    "lengua" => "Castellano",
    "moneda" => "Euro"
  ),
  "francia" => array(
    "nombre" => "Francia",
    "lengua" => "Francés",
    "moneda" => "Euro"
  )
);

echo 'La moneda de España es ' . $pais["españa"]["moneda"]. '<br>';
?>
</body>
</html>
