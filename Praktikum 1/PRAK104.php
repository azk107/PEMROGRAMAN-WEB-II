<?php
$ListSmartphone = ['Samsung Galaxy S22', 'Samsung Galaxy S22+', 'Samsung Galaxy A03', 'Samsung Galaxy Xcover 5']
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
    <title>Praktikum - no4</title>

    <style>
        .Samsung{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <table border="1">
    <tr>
        <td class="Samsung">Daftar Smartphone Samsung</td>
    </tr>
    <tr>
        <td><?php echo $ListSmartphone [0]?></td>
    </tr>
    <tr>
        <td><?php echo $ListSmartphone [1]?></td>
    </tr>
    <tr>
        <td><?php echo $ListSmartphone [2]?></td>
    </tr>
    <tr>
        <td><?php echo $ListSmartphone [3]?></td>
    </tr>
</body>
</html>