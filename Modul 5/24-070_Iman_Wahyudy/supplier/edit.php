<?php
include('../koneksi.php');

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

$nama = $data['nama'];
$telp = $data['telp'];
$alamat = $data['alamat'];
$error = "";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $valid = true;

    if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $error .= "Nama tidak boleh kosong dan hanya boleh huruf.<br>";
        $valid = false;
    }

    if (empty($telp) || !preg_match("/^[0-9]+$/", $telp)) {
        $error .= "Telp tidak boleh kosong dan hanya boleh angka.<br>";
        $valid = false;
    }

    if (empty($alamat) || !preg_match("/^(?=.*[A-Za-z])(?=.*[0-9]).+$/", $alamat)) {
        $error .= "Alamat tidak boleh kosong dan harus mengandung huruf dan angka.<br>";
        $valid = false;
    }

    if ($valid) {
        $query_update = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'";
        mysqli_query($koneksi, $query_update);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
</head>
<body>
    <h2>Edit Data Supplier</h2>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <label>Nama</label><br>
        <input type="text" name="nama" value="<?php echo $nama; ?>"><br><br>

        <label>Telp</label><br>
        <input type="text" name="telp" value="<?php echo $telp; ?>"><br><br>

        <label>Alamat</label><br>
        <input type="text" name="alamat" value="<?php echo $alamat; ?>"><br><br>

        <input type="submit" name="simpan" value="Simpan">
        <a href="index.php"><button type="button">Batal</button></a>
    </form>
</body>
</html>
