<?php
include('../koneksi.php');
$query = mysqli_query($koneksi, "SELECT * FROM supplier");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
</head>
<body>
    <h2>Data Master Supplier</h2>
    <a href="tambah.php">Tambah Data</a>
    <br><br>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php while ($data = mysqli_fetch_array($query)) { ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['telp']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
                <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
