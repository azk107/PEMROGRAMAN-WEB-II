<?php
$notifNama = $notifNIM = $result = $notifGender = "";
$nama = $nim = $gender = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['nama'])) {
        $notifNama = "Nama tidak boleh kosong";
    } else {
        $nama = cek_input($_POST['nama']);
    }
    if (empty($_POST['nim'])){
        $notifNIM = "NIM tidak boleh kosong";
    } else {
        $nim = cek_input($_POST['nim']);
    }
    if (empty($_POST['gender'])){
        $notifGender = "Jenis kelamin tidak boleh kosong";
    } else {
        $gender = cek_input($_POST['gender']);
    }
}
function cek_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device=width, initial-scale = 1.0">
    <title> PRAK 202 - Menampilkan pesan error pada form</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <form method = "POST">
        Nama: <input type = "text" name = "nama" value = "<?= $nama ?>">
        <span class = "error">* <?= $notifNama;?></span></br>
        NIM : <input type = "text" name = "nim" value = "<?= $nim ?>">
        <span class = "error">* <?= $notifNIM;?></span></br>
        Jenis Kelamin :<span class = "error">* <?= $notifGender;?></span></br>
        <input type = "radio" name = "gender" value = "Laki-Laki">Laki-Laki</br>
        <input type = "radio" name = "gender" value = "Perempuan">Perempuan</br>
        <input type = "submit" name = "submit" value = "Submit">
    </form></br>
    <?php
    if(!empty($nama) && !empty($nim) && !empty($gender)) {
        echo "$nama <br>";
        echo "$nim <br>";
        echo "$gender <br>";
    }
    ?>
</body>
</html>