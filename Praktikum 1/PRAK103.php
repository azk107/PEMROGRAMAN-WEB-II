<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
    <title>Praktikum - no3</title>
</head>
<body>
    <?php
    $celcius = 37.841;

    $fahrenheit = ($celcius * 9/5) + 32;
    $reamur = $celcius * 4/5;
    $kelvin = $celcius+ 273.15;

    echo "Fahrenheit (F) : ".number_format($fahrenheit,4). "<br>";
    echo "Reamur (R) : ".number_format($reamur,4). "<br>";
    echo "Kelvin (K) : ".number_format($kelvin,4);
    ?>
</body>
</html>  