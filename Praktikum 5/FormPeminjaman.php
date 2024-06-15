<?php
include 'Koneksi.php';
include_once 'Model.php';

$model = new Model();
$successMsg = "";
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST["id"]) ? test_input($_POST["id"]) : null;
    $id_member = test_input($_POST["id_member"]);
    $id_buku = test_input($_POST["id_buku"]);
    $tgl_pinjam = test_input($_POST["tgl_pinjam"]);
    $tgl_kembali = test_input($_POST["tgl_kembali"]);
    
    if ($id) {
        $result = $model->updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    } else {
        $result = $model->insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    }

    if ($result) {
        $successMsg = $id ? "Data peminjaman berhasil diperbarui!" : "Peminjaman baru berhasil ditambahkan!";
    } else {
        $errorMsg = "Error: " . $conn->error;
    }
}

$id = "";
$id_member = "";
$id_buku = "";
$tgl_pinjam = "";
$tgl_kembali = "";
$heading = "Tambah Peminjaman";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $peminjaman = $model->getPeminjamanById($id);
    if ($peminjaman) {
        $id_member = $peminjaman['id_member'];
        $id_buku = $peminjaman['id_buku'];
        $tgl_pinjam = $peminjaman['tgl_pinjam'];
        $tgl_kembali = $peminjaman['tgl_kembali'];
        $heading = "Edit Peminjaman";
    }
}

$members = $model->getAllMembers();
$books = $model->getAllBooks();

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
            <label for="id_member">Member:</label><br>
            <select id="id_member" name="id_member" required>
                <?php foreach ($members as $member): ?>
                    <option value="<?php echo $member['id_member']; ?>" <?php echo ($id_member == $member['id_member']) ? 'selected' : ''; ?>>
                        <?php echo $member['nama_member']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label for="id_buku">Buku:</label><br>
            <select id="id_buku" name="id_buku" required>
                <?php foreach ($books as $book): ?>
                    <option value="<?php echo $book['id_buku']; ?>" <?php echo ($id_buku == $book['id_buku']) ? 'selected' : ''; ?>>
                        <?php echo $book['judul_buku']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label for="tgl_pinjam">Tanggal Pinjam:</label><br>
            <input type="datetime-local" id="tgl_pinjam" name="tgl_pinjam" value="<?php echo $tgl_pinjam; ?>" required><br>
            <label for="tgl_kembali">Tanggal Kembali:</label><br>
            <input type="date" id="tgl_kembali" name="tgl_kembali" value="<?php echo $tgl_kembali; ?>" required><br><br>
            <div class="button-container">
                <input type='button' value='Kembali' onClick='top.location="halaman_awal.php"'>
                <input type="submit" value="Submit">
                <input type="button" value="Tampilkan Data" onClick="window.location.href='Peminjaman.php'">
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
