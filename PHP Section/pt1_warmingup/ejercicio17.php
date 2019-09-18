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
        $x = 0;
        $y = 0;
        $x = $_GET['step'];
        $spaces = $x - 1;
        $asterisks = 1;
        //Loop for printing each one of the lines.
        while ($spaces != 0) {
            $y = 0;
            //Loop for printing spaces
            while ($y < $spaces) {
                echo "&nbsp;";
                $y = $y + 1;
            }
            $y = 0;
            //Loop for printing asterisks
            while ($y < $asterisks) {
                echo "*";
                $y = $y + 1;
            }
            $asterisks = $asterisks + 2;
            $spaces = $spaces - 1;
            //Jump to next line
            echo "<br>";
        }
    ?>
</body>
</html>