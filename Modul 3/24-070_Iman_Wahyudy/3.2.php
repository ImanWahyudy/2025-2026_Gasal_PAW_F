<?php
// 3.2.1
$fruits = array("Avocado", "Blueberry", "Cerry");

for ($i = 0; $i < 5; $i++) {
    if ($i == 0) $fruits[3] = "Mango";
    if ($i == 1) $fruits[4] = "Orange";
    if ($i == 2) $fruits[5] = "Banana";
    if ($i == 3) $fruits[6] = "Grapes";
    if ($i == 4) $fruits[7] = "Apple";
}

echo "<b>3.2.1 Tambahkan 5 data baru dalam array \$fruits menggunakan FOR!</b><br>";
for ($i = 0; $i <= 7; $i++) {
    echo "Indeks $i : " . $fruits[$i] . "<br>";
}
echo "Panjang array \$fruits saat ini adalah 8 elemen.<br>";
echo "Tidak perlu mengubah struktur FOR karena cukup menyesuaikan batas perulangannya.<br><br>";

// 3.2.2
$veggies = array("Carrot", "Spinach", "Broccoli");

echo "<b>3.2.2 Buat array baru dengan nama \$veggies!</b><br>";
for ($i = 0; $i <= 2; $i++) {
    echo "Indeks $i : " . $veggies[$i] . "<br>";
}
echo "Tidak perlu membuat skrip baru, cukup modifikasi nama array dan batas perulangan.<br>";
?>
