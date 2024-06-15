<?php
require_once 'Model.php';

$model = new Model();
$members = $model->getAllMembers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <link href="mystyle2.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container2">
        <div class="table-container">
            <h1>Daftar Member</h1>
            <table border="1">
                <tr>
                    <th>ID Member</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Alamat</th>
                    <th>Tanggal Mendaftar</th>
                    <th>Tanggal Terakhir Bayar</th>
                    <th>Tindakan</th>
                </tr>
                <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?php echo $member['id_member']; ?></td>
                        <td><?php echo $member['nama_member']; ?></td>
                        <td><?php echo $member['nomor_member']; ?></td>
                        <td><?php echo $member['alamat']; ?></td>
                        <td><?php echo $member['tgl_mendaftar']; ?></td>
                        <td><?php echo $member['tgl_terakhir_bayar']; ?></td>
                        <td>
                            <a href="FormMember.php?id=<?php echo $member['id_member']; ?>">Edit</a>
                            <a href="model.php?id=<?php echo $member['id_member']; ?>&type=member" onclick="return confirm('Apakah Anda yakin ingin menghapus member ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table><br>
            <div class="button-container">
                <input type="button" value="Kembali" onClick="window.location.href='FormMember.php'">
            </div>
        </div>
    </div>
</body>
</html>
