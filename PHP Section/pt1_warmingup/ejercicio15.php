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
    /**
     * Created by PhpStorm.
     * User: ricflair
     * Date: 18/09/18
     * Time: 15:59
     */

    $i = 0;
    $x = 0;
    $z = 0;
    $i = $_GET['step'];
    while ($x != $i) {
        $x=$x+1;
        $z = 0;
        while ($z != $x) {
            $z = $z + 1;
            echo "*";
        }
        echo "<br>";
    }
    ?>
</body>
</html>