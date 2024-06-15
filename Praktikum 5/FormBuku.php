<?php
include 'Koneksi.php';
include_once 'Model.php';

$model = new Model();
$successMsg = "";
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST["id"]) ? test_input($_POST["id"]) : null;
    $judul = test_input($_POST["judul_buku"]);
    $penulis = test_input($_POST["penulis"]);
    $penerbit = test_input($_POST["penerbit"]);
    $tahun = test_input($_POST["tahun_terbit"]);
    
    if ($id) {
        $result = $model->updateBook($id, $judul, $penulis, $penerbit, $tahun);
    } else {
        $result = $model->insertBook($judul, $penulis, $penerbit, $tahun);
    }

    if ($result) {
        $successMsg = $id ? "Data buku berhasil diperbarui!" : "Buku baru berhasil ditambahkan!";
    } else {
        $errorMsg = "Error: " . $conn->error;
    }
}

$id = "";
$judul = "";
$penulis = "";
$penerbit = "";
$tahun = "";
$heading = "Tambah Buku";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $book = $model->getBookById($id);
    if ($book) {
        $judul = $book['judul_buku'];
        $penulis = $book['penulis'];
        $penerbit = $book['penerbit'];
        $tahun = $book['tahun_terbit'];
        $heading = "Edit Buku";
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
    <title><?php echo $heading; ?></title>
    <link href="mystyle2.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <h1><?php echo $heading; ?></h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <?php if ($id): ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            <?php endif; ?>
            <label for="judul_buku">Judul Buku:</label><br>
            <input type="text" id="judul_buku" name="judul_buku" value="<?php echo $judul; ?>" required><br>
            <label for="penulis">Penulis:</label><br>
            <input type="text" id="penulis" name="penulis" value="<?php echo $penulis; ?>" required><br>
            <label for="penerbit">Penerbit:</label><br>
            <input type="text" id="penerbit" name="penerbit" value="<?php echo $penerbit; ?>" required><br>
            <label for="tahun_terbit">Tahun Terbit:</label><br>
            <input type="text" id="tahun_terbit" name="tahun_terbit" value="<?php echo $tahun; ?>" pattern="[0-9]+" required><br><br>
            <div class="button-container">
                <input type='button' value='Kembali' onClick='top.location="halaman_awal.php"'>
                <input type="submit" value="Submit">
                <input type="button" value="Tampilkan Data" onClick="window.location.href='Buku.php'">
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
