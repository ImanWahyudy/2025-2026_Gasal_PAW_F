<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $tanggal = $_POST['waktu_transaksi'];
    $keterangan = $_POST['keterangan'];
    $pelanggan = $_POST['pelanggan_id'];
    $user = 1; // sementara default user id 1 (admin)
    $hari_ini = date('Y-m-d');

    if ($tanggal < $hari_ini) {
        echo "<script>alert('Tanggal transaksi tidak boleh kurang dari hari ini!');</script>";
    } elseif (strlen($keterangan) < 3) {
        echo "<script>alert('Keterangan minimal 3 karakter!');</script>";
    } else {
        mysqli_query($koneksi, "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id, user_id)
                                VALUES ('$tanggal', '$keterangan', 0, '$pelanggan', '$user')");
        echo "<script>alert('Transaksi berhasil ditambahkan');window.location='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Tambah Transaksi</title></head>
<body>
<h2>Tambah Transaksi</h2>
<form method="post">
    <label>Tanggal Transaksi:</label><br>
    <input type="date" name="waktu_transaksi" required><br><br>

    <label>Keterangan:</label><br>
    <textarea name="keterangan" required></textarea><br><br>

    

    <label>Pelanggan:</label><br>
    <select name="pelanggan_id" required>
        <option value="">--Pilih Pelanggan--</option>
        <?php
        $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
        while ($p = mysqli_fetch_assoc($pelanggan)) {
            echo "<option value='{$p['id']}'>{$p['nama']}</option>";
        }
        ?>
    </select><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>
