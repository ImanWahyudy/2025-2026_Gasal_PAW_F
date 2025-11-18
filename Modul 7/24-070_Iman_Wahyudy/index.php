<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Transaksi Toko Memet</title>
</head>
<body>
<h2>Manajemen Transaksi Toko Memet</h2>
<a href="tambah_transaksi.php">+ Tambah Transaksi</a> |
<a href="tambah_detail.php">+ Tambah Detail Transaksi</a>
<br><br>

<!-- DATA BARANG -->
<h3>Data Barang</h3>
<table border="1" cellpadding="5">
    <tr><th>ID</th><th>Nama Barang</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
    <?php
    $barang = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id ASC");
    while ($b = mysqli_fetch_assoc($barang)) {
        echo "<tr>
                <td>{$b['id']}</td>
                <td>{$b['nama_barang']}</td>
                <td>{$b['harga']}</td>
                <td>{$b['stok']}</td>
                <td><a href='hapus_barang.php?id={$b['id']}'>Hapus</a></td>
              </tr>";
    }
    ?>
</table>

<!-- DATA TRANSAKSI -->
<h3>Data Transaksi</h3>
<table border="1" cellpadding="5">
    <tr><th>ID</th><th>Tanggal</th><th>Keterangan</th><th>Total</th><th>Pelanggan</th></tr>
    <?php
    $transaksi = mysqli_query($koneksi, "SELECT t.*, p.nama AS pelanggan 
                                         FROM transaksi t 
                                         LEFT JOIN pelanggan p ON t.pelanggan_id = p.id 
                                         ORDER BY t.id DESC");
    while ($t = mysqli_fetch_assoc($transaksi)) {
        echo "<tr>
                <td>{$t['id']}</td>
                <td>{$t['waktu_transaksi']}</td>
                <td>{$t['keterangan']}</td>
                <td>{$t['total']}</td>
                <td>{$t['pelanggan']}</td>
              </tr>";
    }
    ?>
</table>

<!-- DATA DETAIL TRANSAKSI -->
<h3>Data Detail Transaksi</h3>
<table border="1" cellpadding="5">
    <tr><th>ID Transaksi</th><th>Barang</th><th>Qty</th><th>Harga</th></tr>
    <?php
    $detail = mysqli_query($koneksi, "SELECT d.*, b.nama_barang 
                                      FROM transaksi_detail d
                                      LEFT JOIN barang b ON d.barang_id = b.id 
                                      ORDER BY d.transaksi_id DESC");
    while ($d = mysqli_fetch_assoc($detail)) {
        echo "<tr>
                <td>{$d['transaksi_id']}</td>
                <td>{$d['nama_barang']}</td>
                <td>{$d['qty']}</td>
                <td>{$d['harga']}</td>
              </tr>";
    }
    ?>

    <a href="report_transaksi.php" class="btn btn-primary">Lihat Laporan Penjualan</a>

</table>
</body>
</html>
