<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $euro = 1;
        $pesetas = 166;
        $dinero_euro = 15;
        $dinero_peseta = $dinero_euro * $pesetas / $euro;
        echo "Dinero en Euros:".$dinero_euro."<br>";
        echo "Dinero en Pesetas:".$dinero_peseta."<br>";
    ?>
</body>
</html>