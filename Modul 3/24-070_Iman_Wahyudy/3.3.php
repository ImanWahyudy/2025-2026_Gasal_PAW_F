<?php
// 3.3.1
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "180"
);

$height["Diana"] = "168";
$height["Emma"] = "172";
$height["Frank"] = "170";
$height["George"] = "169";
$height["Harry"] = "175";

echo "<b>3.3.1 Tambahkan 5 data baru dalam array \$height!</b><br>";
echo "Nilai dengan indeks terakhir adalah: " . $height["Harry"] . "<br>";
echo "Indeks terakhir dari array \$height adalah: 'Harry'<br><br>";

// 3.3.2
unset($height["Barry"]);

echo "<b>3.3.2 Hapus 1 data tertentu dari array \$height!</b><br>";
echo "Nilai dengan indeks terakhir adalah: " . $height["Harry"] . "<br>";
echo "Indeks terakhir dari array \$height adalah: 'Harry'<br><br>";

// 3.3.3
$weight = array(
    "Andy" => "70",
    "Barry" => "65",
    "Charlie" => "75"
);

echo "<b>3.3.3 Buat array baru dengan nama \$weight!</b><br>";
echo "Data ke-2 dari array \$weight adalah: " . $weight["Barry"] . "<br>";
?>
