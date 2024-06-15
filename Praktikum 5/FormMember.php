<?php
include 'Koneksi.php';
include_once 'Model.php';

$model = new Model();
$successMsg = "";
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST["id"]) ? test_input($_POST["id"]) : null;
    $name = test_input($_POST["nama"]);
    $nomor = test_input($_POST["nomor"]);
    $alamat = test_input($_POST["alamat"]);
    $tgl_mendaftar = test_input($_POST["tgl_mendaftar"]);
    $tgl_terakhir_bayar = test_input($_POST["tgl_terakhir_bayar"]);
    
    if ($id) {
        $result = $model->updateMember($id, $name, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);
    } else {
        $result = $model->insertMember($name, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);
    }

    if ($result) {
        $successMsg = $id ? "Data member berhasil diperbarui!" : "Member baru berhasil ditambahkan!";
    } else {
        $errorMsg = "Error: " . $conn->error;
    }
}

$id = "";
$name = "";
$nomor = "";
$alamat = "";
$tgl_mendaftar = "";
$tgl_terakhir_bayar = "";

$heading = "Tambah Member";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $member = $model->getMemberById($id);
    if ($member) {
        $name = $member['nama_member'];
        $nomor = $member['nomor_member'];
        $alamat = $member['alamat'];
        $tgl_mendaftar = $member['tgl_mendaftar'];
        $tgl_terakhir_bayar = $member['tgl_terakhir_bayar'];
        $heading = "Edit Member";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah/Edit Member</title>
    <link href="mystyle2.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <h1><?php echo $heading; ?></h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <?php if ($id): ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            <?php endif; ?>
            <label for="nama">Nama Member:</label><br>
            <input type="text" id="nama" name="nama" value="<?php echo $name; ?>" required><br>
            <label for="nomor">Nomor Member:</label><br>
            <input type="text" id="nomor" name="nomor" value="<?php echo $nomor; ?>" pattern="[0-9]+" required><br>
            <label for="alamat">Alamat:</label><br>
            <textarea id="alamat" name="alamat" required><?php echo $alamat; ?></textarea><br>
            <label for="tgl_mendaftar">Tanggal Mendaftar:</label><br>
            <input type="datetime-local" id="tgl_mendaftar" name="tgl_mendaftar" value="<?php echo $tgl_mendaftar; ?>" required><br>
            <label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar:</label><br>
            <input type="date" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" value="<?php echo $tgl_terakhir_bayar; ?>" required><br><br>
            <div class="button-container">
                <input type='button'value='Kembali'onClick='top.location="halaman_awal.php"'>
                <input type="submit" value="Submit">
                <input type="button" value="Tampilkan Data" onClick="window.location.href='Member.php'">
            </div>
        </form>
        <?php if ($successMsg || $errorMsg) : ?>
            <div class="message-container <?php echo $successMsg ? 'success' : 'error'; ?>">
                <center><?php echo $successMsg ? $successMsg : $errorMsg; ?></center>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
