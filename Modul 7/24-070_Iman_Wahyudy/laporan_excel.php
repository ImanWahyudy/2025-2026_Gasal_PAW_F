<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

include 'koneksi.php';

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];
?>

<h2>Laporan Penjualan (<?= $tgl1 ?> - <?= $tgl2 ?>)</h2>

<table border="1">
    <tr>
        <th>Tanggal</th>
        <th>Total Pendapatan</th>
    </tr>

<?php
$data = mysqli_query($koneksi,"
    SELECT t.waktu_transaksi,
           SUM(td.harga * td.qty) AS total
    FROM transaksi t
    JOIN transaksi_detail td ON t.id = td.transaksi_id
    WHERE DATE(t.waktu_transaksi) BETWEEN '$tgl1' AND '$tgl2'
    GROUP BY t.waktu_transaksi
    ORDER BY t.waktu_transaksi ASC
");

while($d = mysqli_fetch_assoc($data)){
    echo "
    <tr>
        <td>{$d['waktu_transaksi']}</td>
        <td>{$d['total']}</td>
    </tr>";
}
?>
</table>
