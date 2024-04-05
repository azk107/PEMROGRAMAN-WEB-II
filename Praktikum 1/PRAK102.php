<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
    <title>Praktikum - no2</title>
</head>
<body>
    <?php
    $alas = 4.2;
    $tinggi = 5.4;
    $panjang = 8.9;
    $lebar = 14.7;

    $luas_alas = $panjang * $lebar;
    $volume = 1/3 * $luas_alas * $tinggi;
    $angka_format = number_format($volume,3);

    echo "Volume Limas= ".$angka_format." m3";
    ?>
</body>
</html>
