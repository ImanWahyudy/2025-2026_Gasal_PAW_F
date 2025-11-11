<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $transaksi = $_POST['transaksi_id'];
    $barang = $_POST['barang_id'];
    $qty = $_POST['qty'];

    // Cek apakah barang sudah ada di transaksi ini
    $cek = mysqli_query($koneksi, "SELECT * FROM transaksi_detail WHERE transaksi_id='$transaksi' AND barang_id='$barang'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Barang ini sudah ditambahkan dalam transaksi ini!');</script>";
    } else {
        // Ambil harga satuan
        $barangData = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT harga FROM barang WHERE id='$barang'"));
        $harga = $barangData['harga'] * $qty;

        // Insert detail transaksi
        mysqli_query($koneksi, "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
                                VALUES ('$transaksi', '$barang', '$harga', '$qty')");

        // Update total di tabel transaksi
        mysqli_query($koneksi, "
            UPDATE transaksi
            SET total = (SELECT SUM(harga) FROM transaksi_detail WHERE transaksi_id='$transaksi')
            WHERE id='$transaksi'
        ");

        echo "<script>alert('Detail transaksi berhasil ditambahkan');window.location='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Tambah Detail Transaksi</title></head>
<body>
<h2>Tambah Detail Transaksi</h2>

<label>Barang:</label><br>
<select name="barang_id" required>
    <option value="">--Pilih Barang--</option>
    <?php
    $barang = mysqli_query($koneksi, "SELECT * FROM barang");
    while ($b = mysqli_fetch_assoc($barang)) {
        echo "<option value='{$b['id']}'>{$b['nama_barang']}</option>";
    }
    ?>
</select><br><br>

<form method="post">
    <label>ID Transaksi:</label><br>
    <select name="transaksi_id" required>
        <option value="">--Pilih Transaksi--</option>
        <?php
        $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY id DESC");
        while ($t = mysqli_fetch_assoc($transaksi)) {
            echo "<option value='{$t['id']}'>#{$t['id']} - {$t['waktu_transaksi']}</option>";
        }
        ?>
    </select><br><br>


    <label>Quantity:</label><br>
    <input type="number" name="qty" min="1" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>
