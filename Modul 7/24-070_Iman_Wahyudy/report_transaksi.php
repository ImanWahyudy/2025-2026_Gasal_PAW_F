<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>

    <style>
        @media print {
            a, button, form {
                display: none;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h2>Laporan Penjualan</h2>

<form method="GET">
    <label>Dari: </label>
    <input type="date" name="tgl1" required>

    <label>Sampai: </label>
    <input type="date" name="tgl2" required>

    <button type="submit">Filter</button>
</form>
<br>

<?php
if(isset($_GET['tgl1']) && isset($_GET['tgl2'])){

    $tgl1 = $_GET['tgl1'];
    $tgl2 = $_GET['tgl2'];

    // AMBIL DATA LAPORAN BERDASARKAN RENTANG TANGGAL
    $data = mysqli_query($koneksi,"
        SELECT t.waktu_transaksi,
               SUM(td.harga * td.qty) AS total
        FROM transaksi t
        JOIN transaksi_detail td ON t.id = td.transaksi_id
        WHERE DATE(t.waktu_transaksi) BETWEEN '$tgl1' AND '$tgl2'
        GROUP BY t.waktu_transaksi
        ORDER BY t.waktu_transaksi ASC
    ");

    $tanggal = [];
    $pendapatan = [];

    while($d = mysqli_fetch_assoc($data)){
        $tanggal[] = $d['waktu_transaksi'];
        $pendapatan[] = $d['total'];
    }
?>

<!-- GRAFIK -->
<canvas id="grafik" height="80"></canvas>

<script>
var ctx = document.getElementById('grafik').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($tanggal); ?>,
        datasets: [{
            label: 'Total Pendapatan',
            data: <?php echo json_encode($pendapatan); ?>,
        }]
    }
});
</script>

<!-- TABEL REKAP -->
<h3>Rekap Pendapatan</h3>

<table border="1" cellpadding="7">
    <tr>
        <th>Tanggal</th>
        <th>Total Pendapatan</th>
    </tr>

<?php
$sum = 0;

for($i=0; $i<count($tanggal); $i++){
    echo "
    <tr>
        <td>{$tanggal[$i]}</td>
        <td>Rp ".number_format($pendapatan[$i])."</td>
    </tr>";

    $sum += $pendapatan[$i];
}
?>
</table>

<!-- TOTAL KUMULATIF -->
<?php
$pelanggan = mysqli_query($koneksi,"
    SELECT COUNT(DISTINCT pelanggan_id) AS total_pelanggan
    FROM transaksi
    WHERE DATE(waktu_transaksi) BETWEEN '$tgl1' AND '$tgl2'
");
$pel = mysqli_fetch_assoc($pelanggan);
?>

<h3>Total</h3>
<table border="1" cellpadding="7">
    <tr>
        <th>Jumlah Pelanggan</th>
        <th>Total Pendapatan</th>
    </tr>
    <tr>
        <td><?= $pel['total_pelanggan']; ?></td>
        <td>Rp <?= number_format($sum); ?></td>
    </tr>
</table>

<br>

<!-- CETAK PDF -->
<button onclick="window.print()" class="btn btn-danger">
    Cetak PDF
</button>

<!-- EXPORT EXCEL -->
<a href="laporan_excel.php?tgl1=<?= $tgl1 ?>&tgl2=<?= $tgl2 ?>" class="btn btn-success">
    Export Excel
</a>

<?php } ?>

</body>
</html>
