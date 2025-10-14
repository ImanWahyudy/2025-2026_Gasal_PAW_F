<?php
$fruits = array("Avocado", "Blueberry", "Cerry");

// 3.1.1
$fruits[] = "Mango";
$fruits[] = "Orange";
$fruits[] = "Banana";
$fruits[] = "Grapes";
$fruits[] = "Apple";

echo "<b>3.1.1 Tambahkan 5 data baru dalam array \$fruits!</b><br>";
echo "Nilai dengan indeks tertinggi adalah: " . $fruits[7] . "<br>";
echo "Indeks tertinggi dari array \$fruits adalah: 7<br><br>";

// 3.1.2
unset($fruits[2]);

echo "<b>3.1.2 Hapus 1 data tertentu dari array \$fruits!</b><br>";
echo "Nilai dengan indeks tertinggi adalah: " . $fruits[7] . "<br>";
echo "Indeks tertinggi dari array \$fruits adalah: 7<br><br>";

// 3.1.3
$veggies = array("Carrot", "Spinach", "Broccoli");

echo "<b>3.1.3 Buat array baru dengan nama \$veggies!</b><br>";
echo "Data pada array \$veggies adalah:<br>";
echo $veggies[0] . "<br>";
echo $veggies[1] . "<br>";
echo $veggies[2] . "<br>";
?>
