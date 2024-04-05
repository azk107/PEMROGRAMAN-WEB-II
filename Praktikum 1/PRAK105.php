<?php
$ListSmartphone = [
    'Samsung1' => 'Samsung Galaxy S22', 
    'Samsung2' => 'Samsung Galaxy S22+', 
    'Samsung3' => 'Samsung Galaxy A03', 
    'Samsung4' => 'Samsung Galaxy Xcover 5']
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
    <title>Praktikum - no5</title>

    <style>
        .Samsung{
            font-weight: 800;
            background-color: red;
            padding: 20px;
        }
    </style>
</head>
<body>
    <table border="1">
    <tr>
        <td class="Samsung">Daftar Smartphone Samsung</td>
    </tr>
    <tr>
        <td><?php echo $ListSmartphone ['Samsung1']?></td>
    </tr>
    <tr>
        <td><?php echo $ListSmartphone ['Samsung2']?></td>
    </tr>
    <tr>
        <td><?php echo $ListSmartphone ['Samsung3']?></td>
    </tr>
    <tr>
        <td><?php echo $ListSmartphone ['Samsung4']?></td>
    </tr>
</body>
</html>