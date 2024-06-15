<?php
require_once 'Model.php';

$model = new Model();
$books = $model->getAllBooks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <link href="mystyle2.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container2">
        <div class="table-container">
            <h1>Daftar Buku</h1>
            <table border="1">
                <tr>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Tindakan</th>
                </tr>
                <?php if ($books): ?>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?php echo $book['id_buku']; ?></td>
                            <td><?php echo $book['judul_buku']; ?></td>
                            <td><?php echo $book['penulis']; ?></td>
                            <td><?php echo $book['penerbit']; ?></td>
                            <td><?php echo $book['tahun_terbit']; ?></td>
                            <td>
                                <a href="FormBuku.php?id=<?php echo $book['id_buku']; ?>">Edit</a>
                                <a href="model.php?id=<?php echo $book['id_buku']; ?>&type=book" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Tidak ada data buku.</td>
                    </tr>
                <?php endif; ?>
            </table>
            <br>
            <input type="button" value="Kembali" onClick="window.location.href='FormBuku.php'">
        </div>
    </div>
</body>
</html>
