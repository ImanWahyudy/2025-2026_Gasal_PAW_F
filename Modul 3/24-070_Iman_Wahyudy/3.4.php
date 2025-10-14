<?php
// 3.4.1 
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

$keys = array("Andy", "Barry", "Charlie", "Diana", "Emma", "Frank", "George", "Harry");

echo "<b>3.4.1 Tambahkan 5 data baru dalam array \$height dan tampilkan dengan FOR!</b><br>";
for ($i = 0; $i <= 7; $i++) {
    $key = $keys[$i];
    echo $key . " = " . $height[$key] . "<br>";
}
echo "Tidak perlu mengubah struktur FOR, cukup menyesuaikan jumlah data yang akan ditampilkan.<br><br>";

// 3.4.2
$weight = array(
    "Andy" => "70",
    "Barry" => "65",
    "Charlie" => "75"
);

$keys2 = array("Andy", "Barry", "Charlie");

echo "<b>3.4.2 Buat array baru dengan nama \$weight!</b><br>";
for ($i = 0; $i <= 2; $i++) {
    $key = $keys2[$i];
    echo $key . " = " . $weight[$key] . "<br>";
}
echo "Tidak perlu membuat skrip baru, cukup ubah nama array dan batas perulangan.<br><br>";


?>