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
        $number = 0;
        $number = $_GET['number'];
        $i = 0;
        echo "Number: ".$number."<br>";
        while ($i < 11) {
            echo $number."*".$i."=".($number*$i)."<br>";
            $i = $i + 1;
        }
    ?>
</body>
</html>