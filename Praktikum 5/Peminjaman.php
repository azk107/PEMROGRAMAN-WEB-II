<?php
include 'Koneksi.php';
include_once 'Model.php';

$model = new Model();
$peminjaman = $model->getAllPeminjaman();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
    <link href="mystyle2.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <h1>Daftar Peminjaman</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>ID Member</th>
                <th>ID Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Tindakan</th>
            </tr>
            <?php if ($peminjaman): ?>
                <?php foreach ($peminjaman as $item): ?>
                    <tr>
                        <td><?php echo $item['id_peminjaman']; ?></td>
                        <td><?php echo $item['id_member']; ?></td>
                        <td><?php echo $item['id_buku']; ?></td>
                        <td><?php echo $item['tgl_pinjam']; ?></td>
                        <td><?php echo $item['tgl_kembali']; ?></td>
                        <td>
                            <a href="FormPeminjaman.php?id=<?php echo $item['id_peminjaman']; ?>">Edit</a>
                            <a href="model.php?id=<?php echo $item['id_peminjaman']; ?>&type=peminjaman" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Tidak ada data peminjaman.</td>
                </tr>
            <?php endif; ?>
        </table>
        <br>
        <input type="button" value="Kembali" onClick="window.location.href='FormPeminjaman.php'">
    </div>
</body>
</html>
